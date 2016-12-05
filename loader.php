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

include_once dirname(__FILE__) . '/core/config/App.php';
include_once dirname(__FILE__) . '/core/config/Assets.php';
include_once dirname(__FILE__) . '/core/config/Translation.php';

$schema_plugin = SchemaPlugin::instance();


$schema_plugin->register('translation_config', function(){
    return SchemaTranslation::instance()->addDependencies($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->register('assets_config', function(){
    return SchemaAssets::instance()->config($schema_plugin);
}, array($schema_plugin) );

$schema_plugin->config()->run();
