<?php defined('APPLICATION') or exit();
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

/**
 * The PagesSettings controller.
 */
class PagesSettingsController extends Gdn_Controller {
    /** @var array List of objects to prep. They will be available as $this->$Name. */
    public $Uses = array('PageModel', 'Form');

    /**
     * Configures navigation sidebar in Dashboard.
     *
     * @param $CurrentUrl ; Path to current location in dashboard.
     */
    private function addSideMenu($CurrentUrl = '') {
        // Only add to the assets if this is not a view-only request
        if ($this->_DeliveryType == DELIVERY_TYPE_ALL) {
            $SideMenu = new SideMenuModule($this);
            $SideMenu->HtmlId = '';

            if ($CurrentUrl != '')
                $SideMenu->HighlightRoute($CurrentUrl);

            $SideMenu->Sort = C('Garden.DashboardMenu.Sort');
            $this->EventArguments['SideMenu'] = & $SideMenu;
            $this->fireEvent('GetAppSettingsMenuItems');
            $this->addModule($SideMenu, 'Panel');
        }
    }

    /**
     * Loads default view for this controller.
     */
    public function index() {
        // Check permission
        $this->permission('Garden.Settings.Manage');

        $this->View = 'allpages';
        $this->allPages();
    }

    /**
     * Loads view with list of all pages.
     */
    public function allPages($IndexPage = false) {
        // Check permission
        $this->permission('Garden.Settings.Manage');

        $this->addJsFile('jquery.tablednd.js');

        // Get page data
        
        $this->setData('Pages', $this->PageModel->get());

        $this->addSideMenu('pagessettings/allpages');
        $this->title(t('BasicPages.Settings.AllPages', 'All Pages'));
        
        $this->render();
    }

    /**
     * Loads view for creating a new page.
     *
     * @param object $Page ; Not NULL when editing a valid page.
     */
    public function newPage($Page = null) {
        // Check permission
        $this->permission('Garden.Settings.Manage');

        // Add JavaScript files.
        $this->addJsFile('jquery-ui.js');
        $this->addJsFile('jquery.autogrow.js');
        $this->addJsFile('pagessettings-newpage.js');

        // Prep Model
        $this->Form->setModel($this->PageModel);

        // Set format data.
        $this->setData('Formats', $this->getFormats());
        $this->addDefinition('DefaultFormat', c('BasicPages.DefaultFormatter', c('Garden.InputFormatter', 'Html')));

        // If form wasn't submitted.
        if ($this->Form->isPostBack() == false) {
            // Prep form with current data for editing
            if (isset($Page)) {
                $this->setData('Page', $Page);
                $this->Form->setData($Page);

                // Send CurrentFormat value to the page to be used for
                // setting the selected value of the formats drop-down.
                $this->addDefinition('CurrentFormat', $Page->Format);

                $this->Form->addHidden('UrlCodeIsDefined', '1');

                if (Gdn::router()->matchRoute($Page->UrlCode . $this->PageModel->RouteExpressionSuffix)) {
                    $this->Form->setValue('HidePageFromURL', '1');
                    $this->Form->setFormValue('HidePageFromURL', '1');
                }
            } else {
                $this->Form->addHidden('UrlCodeIsDefined', '0');
            }
        } else {
            // Form was submitted.
            $FormValues = $this->Form->formValues();

            if (isset($Page)) {
                $FormValues['PageID'] = $Page->PageID;
                $this->Form->setFormValue('PageID', $Page->PageID);
            }

            // Validate form values.
            if ($FormValues['Name'] == '')
                $this->Form->addError(t('BasicPages.Settings.NewPage.ErrorName', 'Page title is required.'), 'Name');
            if ($FormValues['Body'] == '')
                $this->Form->addError(t('BasicPages.Settings.NewPage.ErrorBody', 'Page body is required.'), 'Body');

            // Format Name
            $FormValues['Name'] = Gdn_Format::text($FormValues['Name']);

            // Validate UrlCode.
            if ($FormValues['UrlCode'] == '')
                $FormValues['UrlCode'] = $FormValues['Name'];

            // Format the UrlCode.
            $FormValues['UrlCode'] = Gdn_Format::url($FormValues['UrlCode']);
            $this->Form->setFormValue('UrlCode', $FormValues['UrlCode']);

            $SQL = Gdn::database()->sql();

            // Make sure that the UrlCode is unique among pages.
            $SQL->select('p.PageID')
                ->from('Page p')
                ->where('p.UrlCode', $FormValues['UrlCode']);

            if (isset($Page))
                $SQL->where('p.PageID <>', $Page->PageID);

            $UrlCodeExists = isset($SQL->get()->firstRow()->PageID);

            if ($UrlCodeExists)
                $this->Form->addError(t('BasicPages.Settings.NewPage.ErrorUrlCode',
                    'The specified URL code is already in use by another page.'), 'UrlCode');

            // Make sure sort is set if new page.
            if (!$Page) {
                $LastSort = $this->PageModel->getLastSort();
                $FormValues['Sort'] = $LastSort + 1;
            }

            // Send CurrentFormat value to the page to be used for
            // setting the selected value of the formats drop-down.
            $this->addDefinition('CurrentFormat', $FormValues['Format']);

            // Explicitly cast these values to an integer data type in case
            // they are equal to '' to be valid with MySQL strict mode, etc.
            $FormValues['SiteMenuLink'] = (int)$FormValues['SiteMenuLink'];

            // If all form values are validated.
            if ($this->Form->errorCount() == 0) {
                $PageID = $this->PageModel->save($FormValues);

                $ValidationResults = $this->PageModel->validationResults();
                $this->Form->setValidationResults($ValidationResults);

                // Create and clean up routes for UrlCode.
                if ($Page->UrlCode != $FormValues['UrlCode']) {
                    if (Gdn::router()->matchRoute($Page->UrlCode . $this->PageModel->RouteExpressionSuffix))
                        Gdn::router()->deleteRoute($Page->UrlCode . $this->PageModel->RouteExpressionSuffix);
                }

                if ($FormValues['HidePageFromURL'] == '1'
                    && !Gdn::router()->matchRoute($FormValues['UrlCode'] . $this->PageModel->RouteExpressionSuffix)
                ) {
                    Gdn::router()->setRoute(
                        $FormValues['UrlCode'] . $this->PageModel->RouteExpressionSuffix,
                        'page/' . $FormValues['UrlCode'] . $this->PageModel->RouteTargetSuffix,
                        'Internal'
                    );
                } elseif ($FormValues['HidePageFromURL'] == '0'
                    && Gdn::router()->matchRoute($FormValues['UrlCode'] . $this->PageModel->RouteExpressionSuffix)
                ) {
                    Gdn::router()->deleteRoute($FormValues['UrlCode'] . $this->PageModel->RouteExpressionSuffix);
                }

                // Set up a custom view permission.
                // The UrlCode must be unique and validated before this code.
                $ViewPermissionName = 'BasicPages.' . $FormValues['UrlCode'] . '.View';
                $PermissionTable = Gdn::database()->structure()->table('Permission');
                $PermissionModel = Gdn::permissionModel();

                // If a page is being edited, then check if UrlCode was changed by the user
                // and rename the custom view permission column for the page if it exists accordingly,
                // to keep the permission table clean.
                if (isset($Page) && ($Page->UrlCode != $FormValues['UrlCode'])) {
                    $OldViewPermissionName = 'BasicPages.' . $Page->UrlCode . '.View';
                    $PermissionModel->undefine($OldViewPermissionName);

                    // The column must be dropped for now, because the RenameColumn method
                    // has a bug, which has been reported.
                    //$PermissionTable->RenameColumn($OldViewPermissionName, $ViewPermissionName);
                }

                $ViewPermissionExists = $PermissionTable->columnExists($ViewPermissionName);

                // Check if the user checked the setting to enable the custom view permission.
                if ((bool)$FormValues['ViewPermission']) {
                    // Check if the permission does not exist.
                    if (!$ViewPermissionExists) {
                        // Create the custom view permission.
                        $PermissionModel->define(array($ViewPermissionName => 0));

                        // Set initial permission for the Administrator role.
                        $PermissionModel->save(array(
                            'Role' => 'Administrator',
                            $ViewPermissionName => 1
                        ));
                    }
                } elseif ($ViewPermissionExists) {
                    // Delete the custom view permission if it exists.
                    $PermissionTable->dropColumn($ViewPermissionName);
                }

                if ($this->deliveryType() == DELIVERY_TYPE_ALL) {
                    if (strtolower($this->RequestMethod) == 'newpage') {
                        $this->informMessage(t('Your new page has been saved.'));

                        $this->setRedirectTo('pagessettings/allpages#Page_' . $PageID);
                    } else {
                        $this->informMessage(t('Your changes have been saved. ')
                            . anchor(t('BasicPages.Settings.NewPage.ViewPage', 'View the page'), PageModel::PageUrl($FormValues['UrlCode']), '', array('target' => '_blank')) . '.');
                    }
                }
            }
        }

        // Setup head.
        if ($this->data('Title')) {
            $this->addSideMenu();
            $this->title($this->data('Title'));
        } else {
            $this->addSideMenu('pagessettings/newpage');
            $this->title(t('BasicPages.Settings.NewPage', 'New Page'));
        }
        $this->render();
    }

    private function getFormats() {
        $Formats = array(
            'Html' => 'HTML',
            'Markdown' => 'Markdown',
            'BBCode' => 'BBCode',
            'RawHtml' => 'Raw HTML',
            'RawHtmlLineBreaks' => 'Raw HTML (Automatic Line Breaks)'
        );

        return $Formats;
    }

    /**
     * Wrapper for the NewPage view.
     *
     * @param int $PageID ; Page ID for getting page data.
     */
    public function editPage($PageID = null) {
        // Check permission
        $this->permission('Garden.Settings.Manage');

        $Page = $this->PageModel->getByID($PageID);
        if ($Page != null) {
            $this->View = 'newpage';
            $this->title(t('BasicPages.Settings.EditPage', 'Edit Page'));
            $this->newPage($Page);

            return null;
        }

        throw new Exception(sprintf(t('%s Not Found'), t('Page')), 404);

        return null;
    }

    /**
     * Loads view for deleting a page.
     *
     * @param int $PageID ; Page ID for deleting page data.
     */
    public function deletePage($PageID = null) {
        // Check permission
        $this->permission('Garden.Settings.Manage');

        $Page = $this->PageModel->getByID($PageID);
        if ($Page != null) {
            // Form was submitted with OK
            if ($this->Form->authenticatedPostBack()) {
                $this->PageModel->delete($PageID);

                // Clean up routes for UrlCode.
                if (Gdn::router()->matchRoute($Page->UrlCode . $this->PageModel->RouteExpressionSuffix))
                    Gdn::router()->deleteRoute($Page->UrlCode . $this->PageModel->RouteExpressionSuffix);

                $this->informMessage(t('BasicPages.Settings.DeletingPage', 'Deleting page...'));

                $this->setRedirectTo('pagessettings/allpages');
            }

            $this->addSideMenu();
            $this->title(t('BasicPages.Settings.DeletePage', 'Delete Page'));
            $this->render();

            return null;
        }

        throw new Exception(sprintf(t('%s Not Found'), t('Page')), 404);

        return null;
    }

    /**
     * Include JS, CSS, and modules used by all methods of this controller.
     * Called by dispatcher before controller's requested method.
     */
    public function initialize() {
        if ($this->deliveryType() == DELIVERY_TYPE_ALL)
            $this->Head = new HeadModule($this);
        $this->addJsFile('jquery.js');
        $this->addJsFile('jquery.livequery.js');
        $this->addJsFile('jquery.form.js');
        $this->addJsFile('jquery.popup.js');
        $this->addJsFile('jquery.gardenhandleajaxform.js');
        $this->addJsFile('global.js');

        $this->addCssFile('admin.css');
        $this->addCssFile('pagessettings.css');

        // Call Gdn_Controller's Initialize() as well.
        $this->MasterView = 'admin';
        parent::initialize();

        Gdn_Theme::section('Dashboard');
    }
}
