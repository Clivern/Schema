<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

/**
 * If this file is called directly, abort.
 */
if ( !defined('WPINC') )
{
    die;
}

include_once dirname(__FILE__) . '/core/config/plugin.php';
include_once dirname(__FILE__) . '/core/config/assets.php';
include_once dirname(__FILE__) . '/core/config/translation.php';
include_once dirname(__FILE__) . '/core/libraries/json-ld.php';
include_once dirname(__FILE__) . '/core/libraries/validator.php';
include_once dirname(__FILE__) . '/core/misc/helpers.php';
include_once dirname(__FILE__) . '/core/builders/about-page.php';
include_once dirname(__FILE__) . '/core/builders/admin-settings.php';
include_once dirname(__FILE__) . '/core/builders/front-markup.php';
include_once dirname(__FILE__) . '/core/builders/posts-metaboxes.php';
include_once dirname(__FILE__) . '/core/builders/schema-types.php';


$schema_plugin = SchemaPlugin::instance();

$schema_plugin->register('translation', function(){
    return SchemaTranslation::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('assets', function(){
    return SchemaAssets::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('jsonld', function(){
    return SchemaJsonLd::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('validator', function(){
    return SchemaValidator::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('helpers', function(){
    return SchemaHelpers::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('about', function(){
    return SchemaAbout::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('settings', function(){
    return SchemaSettings::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('markup', function(){
    return SchemaMarkup::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('metaboxes', function(){
    return SchemaMetaboxes::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('types', function(){
    return SchemaTypes::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->config()->run();
