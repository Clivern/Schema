<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

if ( ! class_exists( 'SchemaOptions' ) ) :

    class SchemaOptions {

        private $schema;
        private static $instance;
        private $options = array(


        );


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
            # Used to migrate from 1.x to 2.x
            $this->migrateOldOptions();
            $this->loadOptions();
        }

        public function addOptions()
        {
            return (boolean) add_option( 'schema_wp_plugin_options', $this->options );
        }

        public function loadOptions()
        {
            $options = get_option( 'schema_wp_plugin_options',  $this->options);
            $this->options = array_merge($this->options, $options);
        }

        public function migrateOldOptions()
        {
            #
        }

        public function getOption($key)
        {
            return (isset($this->options[$key])) ? $this->options[$key] : false;
        }

        public function getOptions()
        {
            return $this->options;
        }
    }

endif;