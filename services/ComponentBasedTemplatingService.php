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
     * @param string $string
     * @return string
     */
    public function camelCaseToKebab($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $string));
    }
    
    /**
     * Find the appropriate template and render it with the provided variables
     * @param string $method
     * @param array $variables
     * @param string $name
     * @param string $template_path
     * @return string
     */
    public function getComponent($method, $variables, $name, $template_path)
    {
        // Set template path
        $templates_path = craft()->path->getSiteTemplatesPath();
        craft()->path->setTemplatesPath($templates_path);

        // Try and find the needed template
        $kebab_name = $this->camelCaseToKebab($method);
        $template_name = "{$template_path}/{$kebab_name}";
        $template_path = craft()->templates->doesTemplateExist($template_name);

        // Return and show Exception if template is not defined
        if(!$template_path) {
            throw new Exception(Craft::t('Could not find "{template_name}" {name}.', array(
                'template_name' => $template_name,
                'name' => $name
            )));
            return false;
        }

        return craft()->templates->render($template_name, $variables[0]);
    }
    
}