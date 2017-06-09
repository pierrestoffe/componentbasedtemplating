<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Settings Service
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplating_SettingsService extends BaseApplicationComponent
{
    public $settings;
    public $components_settings;
    public $groups_settings;
    
    public function __construct() {
        $this->settings = new ComponentBasedTemplating_SettingsModel;
    }
    
    public function getComponentsSetting($name)
    {
        return $this->settings['components'][$name];
    }
    
    public function getGroupsSetting($name)
    {
        return $this->settings['groups'][$name];
    }

}