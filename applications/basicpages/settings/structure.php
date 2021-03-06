<?php defined('APPLICATION') or exit(); // Make sure this file can't get accessed directly
/**
 * Copyright (C) 2013-2018  Austin S.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Use this file to do any database changes for your application.

if (!isset($Drop))
{
    $Drop = false; // Safe default - Set to TRUE to drop the table if it already exists.
}
    

if (!isset($Explicit))
{
    $Explicit = false; // Safe default - Set to TRUE to remove all other columns from table.
}
    


$SQL = $Database->sql(); // To run queries.
$Construct = $Database->structure(); // To modify and add database tables.
$Validation = new Gdn_Validation(); // To validate permissions (if necessary).

/**
 * Column() has the following arguments:
 *
 * @param string $Name Name of the column to create.
 * @param string $Type Data type of the column. Length may be specified in parenthesis.
 *    If an array is provided, the type will be set as "enum" and the array's values will be assigned as the column's enum values.
 * @param string $NullOrDefault Default is FALSE. Whether or not nulls are allowed, if not a default can be specified.
 *    TRUE: Nulls allowed. FALSE: Nulls not allowed. Any other value will be used as the default (with nulls disallowed).
 * @param string $KeyType Default is FALSE. Type of key to make this column. Options are: primary, key, or FALSE (not a key).
 *
 * @see /library/database/class.generic.structure.php
 */

// Construct the Page table.
$Construct->table('Page');

$Construct
    ->primaryKey('PageID')
    ->column('Name', 'varchar(100)', false, 'fulltext')
    ->column('UrlCode', 'varchar(100)', false, 'unique')
    ->column('Body', 'longtext', false, 'fulltext')
    ->column('Format', 'varchar(20)', true)
    ->column('DateInserted', 'datetime', false, 'index')
    ->column('DateUpdated', 'datetime', true)
    ->column('Sort', 'int', true)
    ->column('SiteMenuLink', 'tinyint(1)', '0')
    ->column('ViewPermission', 'tinyint(1)', '0')
    ->set($Explicit, $Drop);


// Update procedures from previous versions of Basic Pages.
if (c('BasicPages.Version')) {
    // For Basic Pages installations older than v1.5.
    // Update routes to pages with old expression suffix to new expression suffix.
    if (version_compare(c('BasicPages.Version'), '1.5', '<')) {
        $PageModel = new PageModel();
        $Pages = $PageModel->get()->result();

        $OldRouteExpressionSuffix = '(/.*)?$';

        foreach ($Pages as $Page) {
            if (Gdn::router()->matchRoute($Page->UrlCode . $OldRouteExpressionSuffix)) {
                Gdn::router()->deleteRoute($Page->UrlCode . $OldRouteExpressionSuffix);

                Gdn::router()->setRoute(
                    $Page->UrlCode . $PageModel->RouteExpressionSuffix,
                    'page/' . $Page->UrlCode . $PageModel->RouteTargetSuffix,
                    'Internal'
                );
            }
        }
    }
}

// Set current BasicPages.Version every time the application is enabled.
$appInfo = json_decode(file_get_contents(PATH_APPLICATIONS . DS . 'basicpages' . DS . 'addon.json'), true);
saveToConfig('BasicPages.Version', val('version', $appInfo, 'Undefined'));
