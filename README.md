# IP2Proxy CakePHP Plugin
IP2Proxy library for CakePHP. Use IP2Proxy geolocation database to lookup the country, region, city, ISP and proxy type that any IP address or hostname originates from. http://www.ip2location.com

## INSTALLATION
### For CakePHP 2.x

1. Copy the IP2Proxy folder to *app/Plugin*.
2. Add `CakePlugin::load('IP2Proxy');` to the last line of *app/Config/bootstrap.php*.
3. Download IP2Proxy BIN database
    - IP2Location free LITE database at http://lite.ip2location.com
    - IP2Location commercial database at http://www.ip2location.com
4. Unzip and copy the BIN file into *app/Plugin/IP2Proxy/data* folder. 
5. Rename the BIN file to IP2PROXY.BIN.

### For CakePHP 3.x

1. Copy the IP2Proxy folder to *plugins* folder.
2. Download IP2Proxy BIN database
    - IP2Location free LITE database at http://lite.ip2location.com
    - IP2Location commercial database at http://www.ip2location.com
3. Unzip and copy the BIN file into *plugins/IP2Proxy/data* folder. 
4. Rename the BIN file to IP2PROXY.BIN.
5. Add `use Cake\Core\Configure;` to line20 of *plugins/IP2Proxy/Model/IP2ProxyCore.php*.

**Note:** The plugin has included an old BIN database for your testing and development purpose. 
You may want to download a latest copy of BIN database as the URL stated above.
The BIN database refers to the binary file ended with .BIN extension, but not the CSV format.
Please select the right package for download.

## USAGE
```
if (Configure::version() < '3') {
    App::uses('IP2ProxyCore', 'IP2Proxy.Model');
}
else {
    require_once(ROOT . DS . 'plugins' . DS . 'IP2Proxy' . DS . 'Model' . DS . 'IP2ProxyCore.php');
}

$IP2Proxy = new IP2ProxyCore();
$record = $IP2Proxy->get($this->request->clientIp());

echo 'IP Address: ' . $record['ipAddress'] . '<br>';
echo 'IP Number: ' . $record['ipNumber'] . '<br>';
echo 'ISO Country Code: ' . $record['countryCode'] . '<br>';
echo 'Country Name: ' . $record['countryName'] . '<br>';
echo 'Region Name: ' . $record['regionName'] . '<br>';
echo 'City Name: ' . $record['cityName'] . '<br>';
echo 'ISP Name: ' . $record['isp'] . '<br>';
echo 'Proxy Type: ' . $record['proxyType'] . '<br>';
echo 'Is Proxy: ' . $record['isProxy'] . '<br>';
```

## SUPPORT
Email: support@ip2location.com
Website: http://www.ip2location.com
