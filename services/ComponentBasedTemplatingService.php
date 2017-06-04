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
    /**
     * Transform a camelCase string into a dashed string
     */
    function camelCaseToDash($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $string));
    }
    
    /**
     * Find the appropriate template and render it with the provided variables
     */
    function getComponent($method, $variables, $type)
    {
        // Set template path
        $templates_path = craft()->path->getSiteTemplatesPath();
        craft()->path->setTemplatesPath($templates_path);

        // Try and find the needed template
        $name = $this->camelCaseToDash($method);
        $template_name = "_{$type}/{$name}";
        $template_path = craft()->templates->doesTemplateExist($template_name);

        // Return and show Exception if template is not defined
        if(!$template_path) {
            throw new Exception(Craft::t('Could not find "{template_name}" {type}.', array(
                'template_name' => $template_name,
                'type' => $type == 'components' ? Craft::t('component') : Craft::t('group')
            )));
            return false;
        }

        return craft()->templates->render($template_name, $variables[0]);
    }
    
}