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
 * The Page controller.
 */
class PageController extends Gdn_Controller {
    /** @var array List of objects to prep. They will be available as $this->$Name. */
    public $Uses = array('PageModel');

    protected $Page = null;

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

        $this->addCssFile('style.css');

        parent::initialize();

        $this->fireEvent('AfterInitialize');
    }

    /**
     * Loads default page view.
     *
     * @param string $PageUrlCode ; Unique page URL stub identifier.
     */
    public function index($PageUrlCode = '') {
        $this->Page = $this->PageModel->getByUrlCode($PageUrlCode);

        // Require the custom view permission if it exists.
        // Otherwise, the page is public by default.
        $ViewPermissionName = 'BasicPages.' . $PageUrlCode . '.View';
        if (array_key_exists($ViewPermissionName, Gdn::permissionModel()->permissionColumns()))
            $this->permission($ViewPermissionName);

        // If page doesn't exist.
        if ($this->Page == null) {
            throw new Exception(sprintf(t('%s Not Found'), t('Page')), 404);

            return null;
        }

        $this->setData('Page', $this->Page, false);

        // Add body CSS class.
        $this->CssClass = 'Page-' . $this->Page->UrlCode;

        if (isMobile())
            $this->CssClass .= ' PageMobile';

        // Set the canonical URL to have the proper page link.
        $this->canonicalUrl(PageModel::pageUrl($this->Page));

        // Add modules
        $this->addModule('GuestModule');
        $this->addModule('SignedInModule');

        // Add CSS files
        $this->addCssFile('page.css');

        $this->addModule('NewDiscussionModule');
        $this->addModule('DiscussionFilterModule');
        $this->addModule('BookmarkedModule');
        // $this->addModule('DiscussionsModule');
        // $this->addModule('RecentActivityModule');

        // Setup head.
        if (!$this->data('Title')) {
            $Title = c('Garden.HomepageTitle');

            $DefaultControllerDestination = Gdn::router()->getDestination('DefaultController');
            if (($Title != '') && (strpos($DefaultControllerDestination, 'page/' . $this->Page->UrlCode) !== false)) {
                // If the page is set as DefaultController.
                $this->title($Title, '');

                // Add description meta tag.
                $this->description(c('Garden.Description', null));
            } else {
                // If the page is NOT the DefaultController.
                $this->title($this->Page->Name);

                // Add description meta tag.
                $this->description(sliceParagraph(Gdn_Format::plainText($this->Page->Body, $this->Page->Format), 160));
            }
        }

        $this->render();
    }
}
