<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 24.10.2018
 * Time: 09:56
 */

namespace EpikursVerzeichnis;


class Router
{
    private static $routes = [];
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function add($expression, $function, $method='get'){
        array_push(self::$routes,[
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ]);
    }

    public static function pathNotFound($function){
        self::$pathNotFound=$function;
    }

    public static function methodNotAllowed($function){
        self::$methodNotAllowed = $function;
    }

    public static function run($basepath = "/"){
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);

        if(isset($parsedUrl['path'])){
            $path = $parsedUrl['path'];
        } else {
            $path = "/";
        }

        $method = $_SERVER['REQUEST_METHOD'];

        $pathMatchFound = false;
        $routeMatchFound = false;

        foreach(self::$routes AS $route){
            if($basepath!='' && $basepath!="/"){
                $route['expression'] = "(".$basepath.")".$route['expression'];
            }

            $route['expression'] = "^".$route['expression'];
            $route['expression'] = $route['expression']."$";

            if(preg_match("#".$route['expression']."#", $path, $matches)){
                $pathMatchFound=true;

                if(strtolower($method)==strtolower($route['method'])){
                    array_shift($matches);

                    if($basepath!='' && $basepath!="/"){
                        array_shift($matches);
                    }

                    call_user_func_array($route['function'],$matches);

                    $routeMatchFound = true;

                    break;
                }
            }
        }

        if(!$routeMatchFound){
            if($pathMatchFound){
                header("HTTP/1.0 405 Method not Allowed");
                if(self::$methodNotAllowed){
                    call_user_func_array(self::$methodNotAllowed, [$path,$method]);
                }
            } else {
                header("HTTP/1.0 404 Not Found");
                if(self::$pathNotFound){
                    call_user_func_array(self::$pathNotFound,[$path]);
                }
            }
        }
    }
}