<?php


class Framework
{

    public static function bootstrap()
    {
        Self::init();
        Self::autoload();
        Self::dispatch();

    }

    /**
     * Set any variables that may be required
     */
    private static function init(){
        // Set some path variables to be used throughout the system.
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", '..' . DS);
        define("APP_PATH", ROOT . 'app' . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);;
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);

        // Set Database connection details
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASS", "root");
        define("DB_NAME", "bookshelf");
    }

    /**
     * Breaks the URL into it's component parts and uses them to select a controller and action
     */
    private static function dispatch(){

        $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

        if('/' === $url){
            $controller = new indexController;
            return $controller->index();
        }

        $controller_name = $url[0] . "Controller";
        if(array_key_exists(1,$url)){
            $action_name = $url[1];
        }else{
            $action_name = "index";
        }

        $controller = new $controller_name;

        //TODO: Make this work for more than 1 parameter
        if(array_key_exists(2,$url)){
            return $controller->$action_name($url[2]);
        }
        return $controller->$action_name();

    }

    /**
     * A basic autoloader to save having to include class files individually
     */
    private static function autoload(){

        spl_autoload_register( function ($className) {

            $fileName = $className . '.php';

            $directories = [
                'app/controllers',
                'app/models',
                'framework/core'
            ];

            foreach ($directories as $directory){

                if(file_exists(ROOT.$directory.'/'.$fileName)){
                    require ROOT.$directory.'/'.$fileName;
                }
            }
        });
    }
}