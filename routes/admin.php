<?php
/**
 * This file contains all the routes that are used for admin functionalities.
 *
 * Author: Tharindu Chamikara
 * Date: May 05, 2023
 *
 */

// Admin routes.
Route::group(['middleware' => ['role:ADMIN']], function () {
    Route::prefix('admin')->group(function () {

        // Manage system users.
        Route::prefix('system-users')->group(function () {
            Route::post('add', [\App\Http\Controllers\Admin\UsersController::class, 'add'])->name('system-user-add');
            Route::post('update', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('system-user-update');
            Route::get('add', [\App\Http\Controllers\Admin\UsersController::class, 'addView']);
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'delete']);
            Route::get('info/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'infoView']);
            Route::get('all', [\App\Http\Controllers\Admin\UsersController::class, 'allView']);
        });

        // Manage blog posts.
        Route::prefix('blog-posts')->group(function () {
            Route::post('add', [\App\Http\Controllers\Admin\BlogPostsController::class, 'add'])->name('blog-post-add');
            Route::post('update', [\App\Http\Controllers\Admin\BlogPostsController::class, 'update'])->name('blog-post-update');
            Route::get('add', [\App\Http\Controllers\Admin\BlogPostsController::class, 'addView']);
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\BlogPostsController::class, 'delete']);
            Route::get('info/{id}', [\App\Http\Controllers\Admin\BlogPostsController::class, 'infoView']);
            Route::get('all', [\App\Http\Controllers\Admin\BlogPostsController::class, 'allView']);
        });

        // Manage inquiry.
        Route::prefix('inquiries')->group(function () {
            Route::post('update', [\App\Http\Controllers\Admin\InquiriesController::class, 'update'])->name('update-inquiry');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\InquiriesController::class, 'delete']);
            Route::get('info/{id}', [\App\Http\Controllers\Admin\InquiriesController::class, 'infoView']);
            Route::get('all', [\App\Http\Controllers\Admin\InquiriesController::class, 'allView']);
        });

        Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    });
});
