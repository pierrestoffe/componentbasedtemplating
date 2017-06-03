<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * Component-based Templating Service
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplatingService extends BaseApplicationComponent
{
    function camelCaseToUnderscore($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $string));
    }
    
    function getComponent($method, $variables, $type)
    {
        // Set template path
        $templates_path = craft()->path->getSiteTemplatesPath();
        craft()->path->setTemplatesPath($templates_path);

        // Try and find the needed template
        $name = $this->camelCaseToUnderscore($method);
        $template_name = "_{$type}/{$name}";
        $template_path = craft()->templates->doesTemplateExist($template_name);

        // Return and show Exception if template is not defined
        if(!$template_path) {
            throw new Exception(Craft::t("Could not find '{$template_name}' template"));
            return false;
        }

        return craft()->templates->render($template_name, $variables[0]);
    }
    
}