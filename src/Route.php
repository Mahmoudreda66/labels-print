<?php

namespace Mahmoud\Labels;

class Route
{
    /**
     * container of routes^it's actions
     * 
     * @var array
     */
    private static array $routes = [];

    /**
     * get method
     * 
     * @param string $routeName
     * @param callable|array $action
     * 
     * @return void
     */
    public static function get(string $routeName, callable|array $action): void
    {
        self::$routes['get'][$routeName] = $action;
    }

    /**
     * post method
     * 
     * @param string $routeName
     * @param callable|array $action
     * 
     * @return void
     */
    public static function post(string $routeName, callable|array $action): void
    {
        self::$routes['post'][$routeName] = $action;
    }

    /**
     * resolve all routes
     * 
     * @param Request $request
     * @param Response $response
     * 
     * @return void
     */
    public static function resolve(Request $request, Response $response): void
    {
        $method = $request->method();
        $path = $request->path();

        $action = self::$routes[$method][$path] ?? false;

        if ($action) {
            if (is_array($action)) {
                $className = $action[0];
                $methodName = $action[1];

                call_user_func([new $className, $methodName]);
            } else {
                $action();
            }
        } else {
            // 404 error
            error_view(404);
        }
    }
}
