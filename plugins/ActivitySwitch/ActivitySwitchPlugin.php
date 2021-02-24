<?php
/**
 * @copyright 2021 Gtd.xyz.
 */

use Garden\Container\Container;
use Garden\Schema\Schema;
use Vanilla\ApiUtils;
use Vanilla\Contracts\LocaleInterface;

use Gdn_Session as SessionInterface;


/**
 * Class ActivitySwitchPlugin
 */
class ActivitySwitchPlugin extends Gdn_Plugin {

    /** @var array */
    protected static $_activity_types;

    /**
     * ActivitySwitchPlugin constructor.
     *
     * @param ActivityModel $activityModel
     * @param LocaleInterface $locale
     * @param Gdn_Session $session
     */
    public function __construct(
        ActivityModel $activityModel,
        LocaleInterface $locale,
        SessionInterface $session
    ) {

        $this->activityModel = $activityModel;
        $this->locale = $locale;
        $this->session = $session;

        parent::__construct();
    }

    
    private function addAttributes(array $row, $attributes) {
        if (is_array($attributes) || (is_object($attributes) && $attributes instanceof ArrayObject)) {
            // Normalize the casing of attributes and reaction URL codes.
            if (isset($attributes['react'])) {
                $attributes['React'] = $attributes['react'];
                unset($attributes['react']);
            }
            if (isset($attributes['React']) && is_array($attributes['React'])) {
                foreach ($attributes['React'] as $urlCode => $total) {
                    $type = ReactionModel::reactionTypes($urlCode);
                    if ($type) {
                        $attributes['React'][$type['UrlCode']] = $total;
                        unset($attributes['React'][$urlCode]);
                    }
                }
            }
        }
        $row += ['Attributes' => $attributes];
        return $row;
    }

    /**
     * Add mapper methods.
     *
     * @param SimpleApiPlugin $sender
     */
    public function simpleApiPlugin_mapper_handler($sender) {
        switch ($sender->Mapper->Version) {
            case '1.0':
                $sender->Mapper->addMap([
                    'activityswitch/list' => 'activityswitchs',
                    'activityswitch/get' => 'activityswitchs/get',
                    'activityswitch/add' => 'activityswitchs/add',
                    'activityswitch/edit' => 'activityswitchs/edit',
                    'activityswitch/toggle' => 'activityswitchs/toggle'
                ]);
                break;
        }
    }

    // /**
    //  *
    //  *
    //  * @param Gdn_Controller $sender
    //  */
    // private function addJs($sender) {
    //     $sender->addJsFile('jquery-ui.min.js');
    //     $sender->addJsFile('reactions.js', 'plugins/ActivitySwitch');
    // }


    /**
     * Run once on enable.
     */
    public function setup() {
        $this->structure();
    }

    /**
     * Database updates.
     */
    public function structure() {
        //include dirname(__FILE__).'/structure.php';


        if (c('Plugins.ActivitySwitch.Enabled', null) === false) {
            removeFromConfig('EnabledPlugins.ActivitySwitch');
        }
    }


    /**
     * Adds items to Dashboard menu.
     *
     * @since 1.0.0
     * @param DashboardController $sender
     */
    public function base_getAppSettingsMenuItems_handler($sender) {
        $menu = $sender->EventArguments['SideMenu'];
        $menu->addLink('Forum', t('ActivitySwitch'), 'activityswitch', 'Garden.Community.Manage', ['class' => 'nav-activityswitch']);
    }
    

     /**
      * check setting before save activity.
     *
     * @param ActivityModel $sender
     * @param array $args
     */
    public function ActivityModel_beforeSave_handler($sender, $args) {

        if(isset($sender->EventArguments['Activity']['ActivityTypeID']))
        {
            $activity_type = Gdn::sql()->getWhere('ActivityType', ['ActivityTypeID' => $sender->EventArguments['Activity']['ActivityTypeID']])->resultArray();
            if(!$activity_type || $activity_type['Public']==0)
            {
                $sender->EventArguments['Handled'] = true;
                return false;
            }

            return;

        }

        $sender->EventArguments['Handled'] = true;
        return false;

    }
}

