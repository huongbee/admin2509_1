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


});

