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
    public function getSettings()
    {
        return new ComponentBasedTemplating_SettingsModel;
    }
    
    public function getSetting($name)
    {
        $settings = $this->getSettings();
        return $settings[$name];
    }
    
    public function getComponentsSettings()
    {
        return $this->getSetting('components');
    }
    
    public function getComponentsSetting($name)
    {
        $settings = $this->getComponentsSettings();
        return $settings[$name];
    }
    
    public function getGroupsSettings()
    {
        return $this->getSetting('groups');
    }
    
    public function getGroupsSetting($name)
    {
        $settings = $this->getGroupsSettings();
        return $settings[$name];
    }

}