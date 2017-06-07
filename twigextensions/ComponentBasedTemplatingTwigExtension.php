<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Twig Extension
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class ComponentBasedTemplatingTwigExtension extends \Twig_Extension
{
    /**
     * Set new Twig Global Variables
     */
    public function getGlobals()
    {
        $components_name = craft()->componentBasedTemplating_settings->getComponentsSetting('name');
        $groups_name = craft()->componentBasedTemplating_settings->getGroupsSetting('name');
        
        return [
            $components_name => craft()->componentBasedTemplating_components,
            $groups_name => craft()->componentBasedTemplating_groups,
        ];
    }
}