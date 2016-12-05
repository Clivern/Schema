<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

class SchemaTranslation {

    private $domain = 'schema_plugin_lang';
    private $rel_path = '/schema/langs/';
    private $abs_rel_path = false;
    private $schema;
    private static $instance;

    public static function instance()
    {
        if ( !isset(self::$instance) ) {
          self::$instance = new self();
        }
        return self::$instance;
    }

    public function addDependencies($schema)
    {
        $this->schema = $schema;
        return $this
    }

    public function config()
    {

        add_action('plugins_loaded', array(
            &$this,
            'loadTranslation'
        ));

        return $this;
    }

    public function loadTranslation()
    {
        # Load Language Files
        load_plugin_textdomain( $this->domain, $this->abs_rel_path, $this->rel_path );
    }
}