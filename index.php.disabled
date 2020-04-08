<?php
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

$requestUri = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"]: $_SERVER["REQUEST_URI"];
$requestUri = str_replace("less-code/","", $requestUri);
$basePath = dirname(__FILE__);
$partialFile = "$basePath/__pages/$requestUri/partial.php";    

define ("BASE_PATH", $basePath);
define ("SHARED_PATH", "$basePath/__shared");

if (file_exists($partialFile))
{
    define("INCLUDE_PARTIAL", $partialFile);
    require_once("vendor/autoload.php");
    include "$basePath/master.php";
}
else 
{
    include "$basePath/__pages/404/partial.php";
}
