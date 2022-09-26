<?php

use App\App;
use Mahmoud\Labels\Auth;
use Mahmoud\Labels\Database;
use Mahmoud\Labels\Inc;
use Mahmoud\Labels\Request;
use Mahmoud\Labels\View;

if (!function_exists('base_path')) {
    /**
     * @param string $path
     * 
     * @return string
     */
    function base_path(string $path = ''): string
    {
        return __DIR__ . '..' . DSE . '..' . DSE . '..' . DSE . '..' . DSE . $path;
    }
}

if (!function_exists('view')) {
    /**
     * @param string $viewName
     * @param array $arguments
     * 
     * @return [type]
     */
    function view(string $viewName, array $arguments = [])
    {
        $view = new View();

        return $view->make($viewName, $arguments);
    }
}

if (!function_exists('error_view')) {
    /**
     * @param int $errorCode
     * @param string $fileName
     * @param array $arguments
     * 
     * @return [type]
     */
    function error_view(int $errorCode, string $fileName = '', array $arguments = [])
    {
        $view = new View();

        return $view->error_view($errorCode, $fileName, $arguments);
    }
}

if (!function_exists('asset')) {
    /**
     * @param string $assetName
     * 
     * @return string
     */
    function asset(string $assetName): string
    {
        return DSE . $assetName;
    }
}

if (!function_exists('app')) {
    /**
     * @return App
     */
    function app(): App
    {
        $app = new App;

        return $app;
    }
}

if (!function_exists('env')) {
    /**
     * @param string $key
     * @param string|null $default
     * 
     * @return string
     */
    function env(string $key, string $default = null): string|null
    {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('redirect')) {
    /**
     * @param string $to
     * 
     * @return void
     */
    function redirect(string $to): void
    {
        header("Location: " . $to);
    }
}

if (!function_exists('session')) {
    /**
     * @param string $key
     * @param string|array|null $value
     * 
     * @return string
     */
    function session(string $key, string|array $value = null): string|array|null
    {
        if ($value) {
            $_SESSION[$key] = $value;
        }

        return $_SESSION[$key] ?? null;
    }
}

if (!function_exists('cookie')) {
    /**
     * @param string $key
     * 
     * @return string
     */
    function cookie(string $key): string|null
    {
        return $_COOKIE[$key] ?? null;
    }
}

if (!function_exists('mustAuth')) {
    /**
     * @return void
     */
    function mustAuth(): void
    {
        // if (!session('user') && !cookie('user')) {
        //     redirect('/login');
        // }
    }
}

if (!function_exists('mustNotAuth')) {
    /**
     * @return void
     */
    function mustNotAuth(): void
    {
        // if (session('user') || cookie('user')) {
        //     redirect('/index');
        // }
    }
}

if (!function_exists('request')) {
    /**
     * @param string $key
     * 
     * @return array|string|null
     */
    function request(string $key = ''): array|string|null
    {
        if (empty($key)) {
            return $_REQUEST;
        }

        return $_REQUEST[$key] ?? null;
    }
}

if (!function_exists('flash')) {
    /**
     * @param string $name
     * @param string|int|array $data
     * 
     * @return void
     */
    function flash(string $name, string|int|array $data): void
    {
        session(SESSION_FLASH_SEPARATE_TEXT . $name, $data);
    }
}

if (!function_exists('db')) {
    /**
     * @return [type]
     */
    function db()
    {
        $db = new Database();

        return $db->connect();
    }
}

if (!function_exists('auth')) {
    /**
     * @param string $key
     * 
     * @return Auth
     */
    function auth(string $key = ''): Auth|string|null
    {
        $auth = new Auth;

        if (empty($key)) {
            return $auth;
        }

        return $auth->getLoggedUser()->$key ?? null;
    }
}

if (!function_exists('request_is')) {
    /**
     * @param string $request
     * 
     * @return bool
     */
    function request_is(string $request): bool
    {
        $requestPath = (new Request())->path();

        return $requestPath == $request;
    }
}

if (!function_exists('includeFile')) {
    /**
     * @param string $filePath
     * @param array $arguments
     * 
     * @return [type]
     */
    function includeFile(string $filePath, array $arguments = [])
    {
        $includeObject = new Inc;

        return $includeObject->include($filePath, $arguments);
    }
}
