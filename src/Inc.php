<?php

namespace Mahmoud\Labels;

class Inc
{
    /**
     * @param string $filePath
     * @param array $arguments
     * 
     * @return void
     */
    public function include(string $filePath, array $arguments = []): void
    {
        // prepare arguments
        foreach ($arguments as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include $filePath;
        echo ob_get_clean();
    }
}
