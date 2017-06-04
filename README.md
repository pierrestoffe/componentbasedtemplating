# Component-based Templating plugin for Craft CMS

This plugins makes it easy to work in a component-based templating environment

## Overview

Please start by reading [this post](https://medium.com/base-voices/dry-templating-with-twig-and-craft-cms-543292d114aa). Although the solution depicted is different from what this plugin does, it will give you a great overview of the Twig problematic I'm trying to solve.

After publishing the post, some people then made me aware that the solution I provided (using [`macros`](https://twig.sensiolabs.org/doc/2.x/tags/macro.html) to output flexible components) wouldn't work with Craft 3. Indeed, Craft 3 comes with Twig 2 and one of the deprecated features is [related to macros](https://twig.sensiolabs.org/doc/1.x/deprecated.html#macros).

The alternative would be to stop outputting DRY components using `macros` and embrace simple [`includes`](https://twig.sensiolabs.org/doc/2.x/tags/include.html). But the `{% include '_components/some-component' with {} only %}` notation feels unnecessarily complex and weird to me in this context. In comparison, the `macros` notation was `{{ components.someComponent({}) }}`, which made way more sense to me.

The way this plugin works is that it adds a new `components` Global Variables to the Twig environment. You can then use a macro-like notation like `{{ components.artworkCard({}) }}` to grab the `artwork-card.html` component located in the `craft/templates/_components` directory.

On top of `components`, you can also create `groups` using the same logic. Use `{{ groups.artworks }}` and place the `artwork.file` file in the `craft/templates/_groups` directory. Think of `groups` as groups of `components` that you need to output side by side in a template. For this reason, the core of a `group` file will often be made of a `for` loop.

Find working examples in this repo's Wiki.

Compared to `macros`, this plugin brings the following changes:
- makes calls about ≈12.5% slower (when the page isn’t cached)
- works in Craft 2 and Craft 3
- no need to do the extra-work of defining macros in the `_macros/components` and `_macros/groups` files
- no need to re-import the `_macros/components` and `_macros/groups` macros in component and groups anymore

Scopes remain the same between both options. It means that components and groups have access to Twig Global Variables but not to variables defined upstream.

## Installation

To install the Component-based Templating plugin, follow these steps:

1. Download the [latest release](https://github.com/pierrestoffe/componentbasedtemplating/releases/latest) & unzip the file
2. Rename the directory into `componentbasedtemplating` if necessary
3. Install the plugin in the Craft Control Panel under Settings > Plugins

Component-based Templating works on Craft 2.4.x and Craft 2.5.x.

## Using this plugin

1. Create a component file in your `craft/templates/_components` directory
2. The file name should be the name of your component written in kebab case (eg. `some-component.html`)
3. In the template file where you need to call that component, use `{{ components.someComponent({}) }}` (mind the camel case notation) and pass some parameters inside the curly brackets
4. Back into the component, access the parameters (defined in step 3) simply by using their name (eg. `{{ paramName }}`)

## Roadmap

Some things to do, and ideas for potential features:

* Provide a few components/groups examples
* Make the terminology flexible
* Make the template paths flexible

## Credits

Brought to you by [Pierre Stoffe](https://pierrestoffe.be)
Kickstarted using [pluginfactory.io](https://pluginfactory.io)
