<?php
/**
 * @copyright 2021 gtd.xyz.
 */

/**
 * ActivitySwitch controller.
 *
 * @since 1.0.0
 */
class ActivitySwitchController extends DashboardController {

    /* @var Gdn_Form */
    public $Form;

    /**
     *
     */
    public function initialize() {
        parent::initialize();
        $this->Form = new Gdn_Form();
        $this->Application = 'dashboard';
    }

    /**
     * List activity types.
     */
    public function index() {
        $this->permission('Garden.Community.Manage');
        $this->title(t('Activity Types'));
        
        $this->addSideMenu();

        // Grab all of the activity_types.

        $activity_types = $this->getActivityTypes();

        $this->setData('activity_types', $activity_types);

        include_once $this->fetchViewLocation('settings_functions', '', 'plugins/ActivitySwitch');
        $this->render('activitytypes', '', 'plugins/ActivitySwitch');
    }

    /**
     * Toggle a given activity type on or off.
     *
     * @param string $Name
     * @param boolean $Public
     */
    public function toggle($Name, $Public) {
        $this->permission('Garden.Community.Manage');

        if (!$this->Form->authenticatedPostBack(true)) {
            throw permissionException('PostBack');
        }

        $activity_types = $this->getActivityTypes();

        
        Gdn::sql()->update('ActivityType')
            ->set('Public', $Public)
            ->where('Name', $Name)
            ->put();

        $activity_type = Gdn::sql()->getWhere('ActivityType', ['Name' => $Name])->resultArray();

        if ($this->deliveryType() != DELIVERY_TYPE_DATA) {
            // Send back the new button.
            include_once $this->fetchViewLocation('settings_functions', '', 'plugins/ActivitySwitch');
            $this->deliveryMethod(DELIVERY_METHOD_JSON);

            $this->jsonTarget("#activity_type_{$Name} #activitytype-toggle", activateButton($activity_type), 'ReplaceWith');
            
            if ($active == '1') {
                $this->informMessage(sprintf(t('Enabled %1$s'), val('Name', $activity_type)));
            } else {
                $this->informMessage(sprintf(t('Disabled %1$s'), val('Name', $activity_type)));
            }
        }

        $this->render('blank', 'utility', 'dashboard');
    }

    
    private function getActivityTypes()
    {
        $activity_types = Gdn::sql()->get('ActivityType')->resultArray();

        return $activity_types;
    }

}
