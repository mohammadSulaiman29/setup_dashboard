<?php

namespace DashboardSetup;

class SetupLangSwitch
{
    public static function setup($destination)
    {
        $destination = realpath($destination);
        if (!$destination || !file_exists($destination . '/artisan')) {
            throw new \Exception("Invalid Laravel project path.");
        }

        chdir($destination);

        // Create Middleware
        exec('php artisan make:middleware LocaleMiddleware');
        $middlewarePath = $destination . '/app/Http/Middleware/LocaleMiddleware.php';
        file_put_contents($middlewarePath, "<?php\n\nnamespace App\Http\Middleware;\n\nuse Closure;\nuse Illuminate\Http\Request;\nuse Illuminate\Support\Facades\App;\n\nclass LocaleMiddleware\n{\n    public function handle(Request \$request, Closure \$next)\n    {\n        App::setLocale(session('locale', 'ar'));\n        return \$next(\$request);\n    }\n}\n");

        // Create Controller 
        exec('php artisan make:controller DashboardController');
        $controllerPath = $destination . '/app/Http/Controllers/DashboardController.php';
        file_put_contents($controllerPath, "<?php\n\nnamespace App\Http\Controllers;\n\nuse Illuminate\Support\Facades\Session;\n\nclass DashboardController extends Controller\n{\n    public function changeLang(\$lang)\n    {\n        \$langs = ['ar', 'en', 'ku'];\n        if (in_array(\$lang, \$langs)) {\n            Session::put('locale', \$lang);\n        }\n        return back();\n    }\n}\n");

        // Add Route
        $routeFilePath = $destination . '/routes/web.php';
        file_put_contents($routeFilePath, "\nRoute::get('set-language/{lang}', [\\App\\Http\\Controllers\\DashboardController::class, 'changeLang'])->name('set-language');\n", FILE_APPEND);
    }

    public static function setupInteractive($path)
    {
        try {
            self::setup($path);
            echo "Laravel setup completed successfully.\n";
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}
