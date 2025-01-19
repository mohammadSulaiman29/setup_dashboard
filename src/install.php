<?php

require_once "CopyFiles.php";
require_once "CreateLangFiles.php";
require_once "SetupLangSwitch.php";

use DashboardSetup\CopyFiles;
use DashboardSetup\CreateLangFiles;
use DashboardSetup\SetupLangSwitch;

try {
    echo "Starting installation process...\n";
    $source = readline("Enter source path: (Press Enter if you want to install skote dashboard) ");
    if (!$source) {
        $source = __DIR__ . DIRECTORY_SEPARATOR . "new_dashboard";
    }
    do {
        $destination = readline("Enter destination path (required): ");
        if (!$destination) {
            echo "Destination path is required. Please try again.\n";
        }
    } while (!$destination);
    // تنفيذ عملية نسخ الملفات
    CopyFiles::copyInteractive($source, $destination);

    // إنشاء ملفات اللغات
    CreateLangFiles::createInteractive($destination);

    // إعداد Laravel
    SetupLangSwitch::setupInteractive($destination);

    echo "Installation completed successfully.\n";
} catch (Exception $e) {
    echo "Error during installation: " . $e->getMessage() . "\n";
    exit(1);
}
