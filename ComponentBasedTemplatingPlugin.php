<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * This plugin makes it easy to work in a component-based templating environment
 *
 * @author    Pierre Stoffe
 * @copyright Copyright (c) 2017 Pierre Stoffe
 * @link      https://pierrestoffe.be
 * @package   ComponentBasedTemplating
 * @since     1.0.0
 */

namespace Craft;

class ComponentBasedTemplatingPlugin extends BasePlugin
{
    /**
     * @return string
     */
    public function getName()
    {
         return Craft::t('Component-based Templating');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return Craft::t('This plugins makes it easy to work in a component-based templating environment');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/pierrestoffe/craft-componentbasedtemplating/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/pierrestoffe/craft-componentbasedtemplating/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Pierre Stoffe';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://pierrestoffe.be';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * @return Twig_Extension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.componentbasedtemplating.twigextensions.ComponentBasedTemplatingTwigExtension');

        return new ComponentBasedTemplatingTwigExtension();
    }
}