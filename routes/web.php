<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('admin/dashboard');
});
Route::get('admin', function () {
    return redirect('admin/dashboard');
});

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    Cache::forget('spatie.permission.cache');
    return 'cleared';
});

Route::name('admin.')->group(function () {
    //LOGIN GROUP
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['guest:admin', 'throttle:100,1']], function () {

        //LOGIN ROUTE
        Route::get('login', [LoginController::class, 'getLogin'])->name('login.view');
        Route::post('login', [LoginController::class, 'postLogin'])->name('login.post');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'throttle:100,1']], function () {

        //Dashboard Route
        Route::get('dashboard', [DashboardController::class, 'getIndex'])->name('dashboard.view');
        Route::get('profile', [DashboardController::class, 'getProfile'])->name('dashboard.profile');
        Route::post('profile', [DashboardController::class, 'postProfile'])->name('dashboard.profile.post');
        Route::get('password', [DashboardController::class, 'getPassword'])->name('dashboard.password');
        Route::post('password', [DashboardController::class, 'postPassword'])->name('dashboard.password.post');
        if(\Illuminate\Support\Facades\Schema::hasTable('permissions')){

            $routes = \Spatie\Permission\Models\Permission::Where('url', '<>', '')->get();
            foreach ($routes as $route) {

                $request_type = $route->request_type;
                $url = $route->url;
                $controller = $route->controller;
                $action = $route->action;
                $name = str_replace('admin.', '', $route->name);
                $permission_name = $route->name;

                $last_space_position = strrpos($controller, '::');
                $controller = substr($controller, 0, $last_space_position);
                Route::$request_type($url, $controller . '@' . $action)->name($name)->middleware(['permission:' . $permission_name]);
            }
        }

        // ROLES ROUTE
        /*
        Route::get('applications', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'getIndex'])->name('applications.view');
        Route::get('applications/list', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'getList'])->name('applications.list');

        Route::get('applications/create', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'create'])->name('applications.create');
        Route::post('applications/create', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'store'])->name('applications.store');
        Route::get('applications/editApp/{id}', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'edit'])->name('applications.editApp');
        Route::PUT('applications/editApp/{id}', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'update'])->name('applications.updateApp');
*/
//        Route::get('applications/info/{id}', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'info'])->name('applications.info');
//        Route::get('applications/delete/{id}', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'getDelete'])->name('applications.delete');
//        Route::post('applications/status', [\App\Http\Controllers\Admin\RegistrationApplicationsController::class, 'postStatus'])->name('applications.status');

        //Logout Route
        Route::get('logout', [DashboardController::class, 'getLogout'])->name('dashboard.logout');

    });
});

//Dictionary Route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('dictionary.js', function () {
        return response()->view('admin.common.general')->header('content-type', 'text/javascript; charset=utf-8');
    })->name('admin.common.general');

});
