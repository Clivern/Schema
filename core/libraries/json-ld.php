<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

if ( ! class_exists( 'SchemaJsonLd' ) ) :

    class SchemaJsonLd {

        private $schema;
        private static $instance;
        public $nodes = array();

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

        }

        public function addNode($node)
        {
            $this->nodes[] = $node;
            return (count($this->nodes) - 1);
        }

        public function getNode($node_id)
        {
            if( isset($this->nodes[$node_id]) ){
                return $this->nodes[$node_id];
            }
            return false;
        }

        public function deleteNode($node_id)
        {
            if( isset($this->nodes[$node_id]) ){
                return (boolean) unset($this->nodes[$node_id]);
            }
            return false;
        }

        public function toJson()
        {
            return json_encode($this->nodes);
        }
    }

endif;