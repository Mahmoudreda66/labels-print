<?php

namespace Mahmoud\Labels;

use Exception;

class View
{
    /**
     * @param string $viewName
     * @param array $arguments
     * 
     * @return void
     */
    public function make(string $viewName, array $arguments = []): void
    {
        foreach ($arguments as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $this->getPath($viewName);

        echo ob_get_clean();
    }

    /**
     * @param int $errorCode
     * @param string $fileName
     * @param array $arguments
     * 
     * @return void
     */
    public function error_view(int $errorCode, string $fileName = '', array $arguments = []): void
    {
        $fileLastName = empty($fileName) ? $errorCode : $fileName;
        $filePath = $this->getPath($fileLastName, true);

        foreach ($arguments as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $filePath;

        echo ob_get_clean();
    }

    /**
     * @param string $viewName
     * @param bool $isError
     * 
     * @return string
     */
    private function getPath(string $viewName, bool $isError = false): string
    {
        $viewName = str_replace('.', DSE, $viewName);
        $viewsDirectoryPath = 'resources' . DSE . 'views' . DSE;

        if ($isError) {
            return base_path($viewsDirectoryPath . 'errors' . DSE . $viewName . '.php');
        }

        return base_path($viewsDirectoryPath . $viewName . '.php');
    }
}
