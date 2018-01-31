<?php

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
    return view('welcome');
});

Route::get('admin-login',[
    'uses'=>'AdminController@getFormLogin',
    'as'=>'admin-login'
]);

Route::get('admin/login/google',[
    'uses'=>'AdminController@redirectToProvider',
    'as'=>'redirect-to-provider'
]);

//http://localhost/admin2509/admin/login/google/callback
Route::get('admin/login/google/callback',[
    'uses'=>'AdminController@handleProviderCallback',
    'as'=>'login-callback'
]);

Route::group(['prefix'=>'admin'],function(){

    // admin/type
    Route::get('/type',[
        'uses'=>'AdminController@getListType',
        'as'=>'list_type'
    ]);

    Route::get('add-type',[
        'uses'=>'AdminController@getAddType',
        'as'=>'addType'
    ]);
    
    Route::post('add-type',[
        'uses'=>'AdminController@postAddType',
        'as'=>'addType'
    ]);
    Route::get('edit-type-{id}',[
        'uses'=>'AdminController@getEditType',
        'as'=>'editType'
    ]);
    
    Route::post('edit-type-{id}',[
        'uses'=>'AdminController@postEditType',
        'as'=>'editType'
    ]);

    Route::get('delete',[
        'uses'=>'AdminController@getDeleteType',
        'as' => 'deleteType'
    ]);

    Route::get('product-{id_type}',[
        'uses'=>'AdminController@getProductByType',
        'as'=>'list_product'
    ]);

    Route::get('delete-food',[
        'uses'=>'AdminController@getDeleteFood',
        'as' => 'deleteFood'
    ]);

    Route::get('add-food',[
        'uses'=>'AdminController@getAddFood',
        'as'=>'addFood'
    ]);
    
    Route::post('add-food',[
        'uses'=>'AdminController@postAddFood',
        'as'=>'addFood'
    ]);


    Route::get('edit-food-{id}',[
        'uses'=>'AdminController@getEditFood',
        'as'=>'editFood'
    ]);
    
    Route::post('edit-food-{id}',[
        'uses'=>'AdminController@postEditFood',
        'as'=>'editFood'
    ]);

    Route::get('manage-bill',[
        'uses'=>'AdminController@getManageBill',
        'as'=>"manageBill"
    ]);

    Route::post('update-status',[
        'uses'=>"AdminController@updateBillStatus",
        'as'=>"update-status"
    ]);



    //https://github.com/huongnguyen08/php4
    /**
     * 
     * CREATE TABLE `social_provider` (
        `id` int(11) NOT NULL,
        `provider_id` varchar(100) DEFAULT NULL,
        `email` varchar(100) DEFAULT NULL,
        `provider` varchar(100) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
        )
     */
    //http://localhost/admin2509/admin/login/google/callback

});

