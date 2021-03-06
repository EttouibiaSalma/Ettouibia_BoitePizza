<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('formule', 'FormuleCrudController');
    Route::crud('Order', 'OrderCrudController');
    Route::crud('supplement', 'SupplementCrudController');
    Route::crud('elementbase', 'ElementbaseCrudController');
}); // this should be the absolute last line of this file