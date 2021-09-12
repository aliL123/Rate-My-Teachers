<?php
session_start();

require "autoload.php";
require "core/phpqrcode/qrlib.php";

//determine the folder of the project within htdocs
$path = getcwd(); // current working dicternoery



$path = preg_replace('/^.+\\\\htdocs\\\\/','/',$path);
$path = preg_replace('/\\\\/','/',$path);
$path= str_replace('\\','/',$path) ;// replace pattern with nothing
//carret = ^[^n] not n... anything but outside the brackets and beginning of a pattern it means starts with
// backslash in  a patterns = \\\\
// windows must use backslashes not front slashes
//start string with forward slash when u replace it
define("BASE",$path);
// from this define a constant

?>