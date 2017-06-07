<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Components Settings Model
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplating_GroupsSettingsModel extends BaseModel
{
    public function setAttribute($name, $value)
    {
        parent::setAttribute($name, $value);
    }

    protected function defineAttributes()
    {
        $attributes = array(
            'name' => array(AttributeType::String, 'default' => 'groups'),
            'templatePath' => array(AttributeType::String, 'default' => '_groups')
        );
        
        return $attributes;
    }

}