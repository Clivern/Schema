<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

class SchemaHelpers {


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
}