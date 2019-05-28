<?php
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
