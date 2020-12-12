<?php

use App\Test;
use App\TestFacade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
//Service Provider
// Route::get('/',function(){
//     $container = new Container();
//     $container->bind('test',function(){
//         return new Test();
//     });
//     $res = $container->resolve('test');
//     dd($res->some());
// });

Route::get('/',function(){
    dd(resolve('test')->execute());
    // return TestFacade::execute();
    //  return View::make('welcome');
    // return view('welcome');
    // return Request::input('name');
});

Route::resource('posts',HomeController::class)->middleware(['auth']);
Route::get('logout',[AuthController::class,'logout']);

