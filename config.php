<?php

/**
 * Component-based Templating configuration
 */

return array(
    /**
     * Individual components
     * Set the global variable name and template path
     */
    'components' => array(
        'name' => 'components', // Default is 'components'
        'templatePath' => '_components' // Default is '_components'
    ),
    
    /**
     * Grouped components
     * Set the global variable name and template path
     */
    'groups' => array(
        'name' => 'groups', // Default is 'groups'
        'templatePath' => '_groups' // Default is '_groups'
    )
);