<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Components Service
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplating_ComponentsService extends BaseApplicationComponent
{
    public function __call($method, $variables)
    {
        echo craft()->componentBasedTemplating->getComponent($method, $variables, 'components');
    }

}