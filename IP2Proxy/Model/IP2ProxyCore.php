<?php
/**
 * IP2Proxy Core
 *
 * Model class to find IP Proxy information using visitor IP address using
 * IP2Proxy database.
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to the MIT License that is available
 * through the world-wide-web at the following URI:
 * http://www.opensource.org/licenses/mit-license.php.
 *
 * @author     IP2Location <support@ip2location.com>
 * @copyright  Copyright 2017, IP2Location.com (http://www.ip2location.com)
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @version    1.1.0
 * @since      File available since Release 2.0
 */

if(Configure::version() < '3') {
    // App::uses('AppModel', 'Model');
    App::import('IP2Proxy.Lib', 'IP2Proxy');
}
else {
    require_once(ROOT . DS . 'plugins' . DS . 'IP2Proxy' . DS . 'Lib' . DS . 'IP2Proxy.php');
}

/**
 * GeoIP Location class
 */
class IP2ProxyCore
{
    /**
     * Container for data returned by the find method
     *
     * @var array
     * @access public
     */
    public $data = array();

    /**
     * The name of the model
     *
     * @var string
     * @access public
     */
    public $name = 'IP2ProxyCore';

    public $useTable = false;

    /**
     * Find
     *
     * @param string $ipAddr The IP Address for which to find the location.
     * @return mixed Array of location data or null if no location found.
     * @access public
     */
    public function get($ip, $query = array())
    {
        $obj = new \IP2Proxy\Database(dirname(dirname(__FILE__)) . DS . 'data' . DS . 'IP2PROXY.BIN', \IP2Proxy\Database::FILE_IO);

        try {
            $records = $obj->lookup($ip, \IP2Proxy\Database::ALL);
        } catch (Exception $e) {
            return null;
        }
        return $records;
    }
}
