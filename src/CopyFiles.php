<?php

namespace DashboardSetup;

class CopyFiles
{
    public static function copy($source, $destination)
    {
        $source = str_replace("\\", "/", $source);
        $destination = str_replace("\\", "/", $destination);
        $source = realpath(trim($source));
        $destination = realpath(trim($destination));

        if (!$source || !is_dir($source)) {
            throw new \Exception("Source folder does not exist or is not a directory.");
        }
        if (!$destination || !is_dir($destination)) {
            throw new \Exception("Destination folder does not exist or is not a directory.");
        }

        $publicPath = $destination . DIRECTORY_SEPARATOR . 'public';
        $viewPath = $destination . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layouts';

        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }
        if (!file_exists($viewPath)) {
            mkdir($viewPath, 0777, true);
        }

        $folders = scandir($source);
        foreach ($folders as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $srcFile = $source . DIRECTORY_SEPARATOR . $file;

            if (is_dir($srcFile) && in_array(basename($srcFile), ['asset', 'assets'])) {
                self::copyFolder($srcFile, $publicPath . DIRECTORY_SEPARATOR . basename($srcFile));
                continue;
            }

            if (is_dir($srcFile)) {
                $hasCssOrJs = false;
                $filesInDir = scandir($srcFile);
                foreach ($filesInDir as $innerFile) {
                    if (in_array(pathinfo($innerFile, PATHINFO_EXTENSION), ['css', 'js', 'json', 'png', 'jpg', 'svg', 'jpeg'])) {
                        $hasCssOrJs = true;
                        break;
                    }
                }

                if ($hasCssOrJs) {
                    self::copyFolder($srcFile, $publicPath . DIRECTORY_SEPARATOR . basename($srcFile));
                    continue;
                }

                self::copyBladeFiles($srcFile, $viewPath);
            }

            if (is_file($srcFile) && str_contains($file, '.blade.php')) {
                copy($srcFile, $viewPath . DIRECTORY_SEPARATOR . $file);
            }
        }
    }

    private static function copyFolder($source, $destination)
    {
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $files = scandir($source);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $srcFile = $source . DIRECTORY_SEPARATOR . $file;
            $destFile = $destination . DIRECTORY_SEPARATOR . $file;

            if (is_dir($srcFile)) {
                self::copyFolder($srcFile, $destFile);
            } else {
                copy($srcFile, $destFile);
            }
        }
    }

    private static function copyBladeFiles($directory, $destination)
    {
        $files = scandir($directory);
        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $filePath = $directory . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                self::copyBladeFiles($filePath, $destination);
            } elseif (is_file($filePath) && str_contains($file, '.blade.php')) {
                copy($filePath, $destination . DIRECTORY_SEPARATOR . basename($file));
            }
        }
    }

    public static function copyInteractive($source, $destination)
    {
        try {
            self::copy($source, $destination);
            echo "Files copied successfully.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}
