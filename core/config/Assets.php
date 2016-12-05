<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

class SchemaAssets {


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
        add_action('admin_enqueue_scripts', array(
            &$this,
            'backEnqueue'
        ));
        add_action('admin_head', array(
            &$this,
            'backHeaderPrint'
        ));

        return $this;
    }

    public function backEnqueue($hook)
    {
        wp_enqueue_media();
        wp_enqueue_style('dashboard');
        wp_enqueue_style('thickbox');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }

    public function backHeaderPrint()
    {
        ?>
        <script type="text/javascript">
            /* <![CDATA[ */
            var schema_test = "bla";
            /* ]]> */
        </script>
        <?php
    }
}