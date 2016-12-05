<?php
/**
 * Schema
 *
 * @package     Schema
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.0.0
 */

class SchemaPlugin {


    private static $instance;

    private $container = array();


    public static function instance()
    {
        if ( !isset(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function register($key, $value, $parameters = array())
    {
        if( is_callable($value) ){
            $this->container[$key] = call_user_func_array($value, $parameters);
        }else{
            $this->container[$key] = $value;
        }

        return $this->container[$key];
    }

    public function exist($key)
    {
        if ( isset($this->container[$key]) ) {
            return true;
        }

        return false;
    }

    public function get($key)
    {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }

        return false;
    }

    public function config()
    {
        register_activation_hook( INTERCOM_CORE_ROOT_FILE, array(
            &$this,
            'activation'
        ));

        register_deactivation_hook( INTERCOM_CORE_ROOT_FILE, array(
            &$this,
            'deactivation'
        ));

        return $this;
    }

    public function run()
    {
        $this->get('translation_config')->config();
        $this->get('assets_config')->config();

        return $this;
    }

    public function activation()
    {

        if ( version_compare(get_bloginfo('version'), '3.9', '<') ) {

            wp_die(__('WordPress Blog Version Must Be Higher Than 3.9 So Please Update Your Blog', $this->domain), 'Schema');

        } else {
            # Run Activation here
        }
    }

    public function deactivation()
    {
        flush_rewrite_rules();
    }

    private function toSlug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $string)));
    }
}