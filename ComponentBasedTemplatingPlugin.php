<?php
/**
 * Component-based Templating plugin for Craft CMS
 *
 * This plugins makes it easy to work in a component-based templating environment
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
    public function getName()
    {
         return Craft::t('Component-based Templating');
    }

    public function getDescription()
    {
        return Craft::t('This plugins makes it easy to work in a component-based templating environment');
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/pierrestoffe/componentbasedtemplating/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/pierrestoffe/componentbasedtemplating/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Pierre Stoffe';
    }

    public function getDeveloperUrl()
    {
        return 'https://pierrestoffe.be';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.componentbasedtemplating.twigextensions.ComponentBasedTemplatingTwigExtension');

        return new ComponentBasedTemplatingTwigExtension();
    }
}