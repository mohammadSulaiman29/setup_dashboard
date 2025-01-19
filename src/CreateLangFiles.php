<?php

namespace DashboardSetup;


class CreateLangFiles
{
    private static $kuLang;
    private static  $arLang;
    private static  $enLang;

    public static function create($path)
    {
        self::$kuLang = require "langs/settings.ku.php";
        self::$arLang = require "langs/settings.ar.php";
        self::$enLang = require "langs/settings.en.php";
        $basePath = $path . '/lang';
        $folders = ['ar', 'en', 'ku'];
        $contents = [
            'ar' => self::convertArrayToPHP(self::$arLang),
            'en' => self::convertArrayToPHP(self::$enLang),
            'ku' => self::convertArrayToPHP(self::$kuLang),
        ];

        if (!is_dir($path)) {
            throw new \Exception("The destination project path does not exist.");
        }

        if (!is_dir($basePath)) {
            mkdir($basePath, 0777, true);
        }

        foreach ($folders as $folder) {
            $folderPath = $basePath . '/' . $folder;
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $settingsFilePath = $folderPath . '/setting.php';
            if (!file_exists($settingsFilePath)) {
                file_put_contents($settingsFilePath,  $contents[$folder]);
            }
        }
        echo "Language files created successfully.\n";
    }

    private static function convertArrayToPHP($array)
    {
        $exportedArray = var_export($array, true);
        return "<?php\nreturn {$exportedArray};\n";
    }

    public static function createInteractive($path)
    {
        try {
            self::create($path);
            echo "Language files created successfully.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}
