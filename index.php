<?php
/**
 * Created by PhpStorm.
 * User: MAV
 * Date: 12.03.2017
 * Time: 23:55
 */

$host=$_SERVER['HTTP_HOST'];

if (isset($host)){
    header("Location: http://$host/list.php", true, 301);
}
