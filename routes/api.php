<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::POST('/upload/images/',[ \App\Http\Controllers\Api\UploadController::class , 'image' ])->name('upload.imagespartner');
// Route::get('/upload/image/{image}/delete',[ \App\Http\Controllers\Api\UploadController::class , 'destroyImage' ]);

Route::match(['PUT', 'POST'],'/upload/image/',[ \App\Http\Controllers\Api\UploadController::class , 'image' ]);
Route::get('/upload/image/{image}/delete',[ \App\Http\Controllers\Api\UploadController::class , 'destroyImage' ]);

Route::get('image/{image}/{type?}',[ App\Http\Controllers\Api\ImageController::class , 'getImageFile'])->name('image');
Route::resource("images", App\Http\Controllers\Api\ImageController::class )->only([
    'index' , 'show' , 'store' , 'destroy'
]);


Route::macro('resourceProducts', function ($uri, $controller) {
    Route::get("{$uri}/categories", "{$controller}@withCategories")->name("{$uri}.with-categories");
    Route::get("{$uri}/{product}/categories", "{$controller}@showWithCategories")->name("{$uri}.with-categories");
    Route::resource($uri, $controller)->only([
        'index' , 'show' , 'update'
    ]);

});
Route::resourceProducts('product', App\Http\Controllers\Api\ProductController::class );
