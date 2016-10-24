<?php
namespace Pug;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Application {
    protected $route;
    public function __construct($srcPath, $pathInfo)
    {
        $this->route = (isset($pathInfo) && $pathInfo != '/') ? ltrim($pathInfo, '/') : '/';

        spl_autoload_register(function($class) use($srcPath) {
            if (
                strstr($class, 'Pug') /* new name */ ||
                strstr($class, 'Jade') /* old name */
            ) {
            	include($srcPath . str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php');
            }
        });
    }
    public function action($path, \Closure $callback)
    {
        if ($path === $this->route) {
            $pug = new Pug(array(
				'prettyprint' => true,
				'basedir' => __DIR__ . '/template/pages',
			));
            $vars = $callback($path) ?: array();
//            echo $pug->compile(__DIR__ . '/template/pages/' . $path . $pug->getExtension());
            echo $pug->render(__DIR__ . '/template/pages/' . $path . $pug->getExtension(), $vars);
        }
    }
}
$pathInfo = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];
$app = new Application(__DIR__ . '/vendor/pug-php/pug/src/', $pathInfo);