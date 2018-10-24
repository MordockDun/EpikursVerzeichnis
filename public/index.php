<?php

require_once "../vendor/autoload.php";

//4echo var_export($_REQUEST,true);
//echo "<hr>";

use EpikursVerzeichnis\router\Router;

Router::add("/",function(){
    echo "Welcome";
});

Router::add("/test.html", function(){
    echo "test.html gibt eigentlich gar nicht....";
});

Router::add('/foo/([0-9]*)/bar',function($var1){
    echo $var1.' is a great number!';
});

Router::run();