<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Settings Model
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplating_SettingsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        
        $settings = $this->getSettings();
        
        foreach($settings as $key => $name) {
            $this[$key] = $name;
        }
    }
    
    protected function getSettings()
    {
        $settings = array();
        
        foreach($this->attributeNames() as $name) {
            if(craft()->config->exists($name, 'componentbasedtemplating')) {
                $settings[$name] = craft()->config->get($name, 'componentbasedtemplating');
            }
        }
        
        return $settings;
    }

    protected function defineAttributes()
    {
        $attributes = array(
            'components' => array(
                'type' => AttributeType::Mixed,
                'model' => 'ComponentBasedTemplating_ComponentsSettingsModel'
            ),
            'groups' => array(
                'type' => AttributeType::Mixed,
                'model' => 'ComponentBasedTemplating_GroupsSettingsModel'
            )
        );
        
        return $attributes;
    }

}