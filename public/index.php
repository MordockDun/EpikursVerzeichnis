<?php

require_once "../vendor/autoload.php";


use EpikursVerzeichnis\router\Router;

Router::methodNotAllowed(function($path,$method){
    echo "Method ".$method." not allowed for path ".$path;
});
Router::pathNotFound(function($path){
    echo "Path '".$path."' not found";
});


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