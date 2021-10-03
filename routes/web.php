<?php

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

Route::group(['namespace'=>'Admin'], function(){
    Route::group(['prefix'=>'login', 'middleware'=>['CheckLogedIn', 'CheckAdmin']], function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });
    Route::group(['prefix'=>'register'], function(){
        Route::get('/','RegisterController@getRegister');
        Route::post('/','RegisterController@postRegister');
    });
});

//backend them middleware auth:user
Route::group(['namespace'=>'backend'], function(){
    Route::get('logout', 'HomeController@getLogout');

    Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function(){
        Route::get('home','HomeController@index');

        Route::group(['prefix'=>'category'], function(){
            Route::get('/', 'CategoriesController@getCategory');

            Route::get('add', 'CategoriesController@getAddCategory');
            Route::post('add', 'CategoriesController@postAddCategory');
        
            Route::get('edit/{id}', 'CategoriesController@getEditCategory');
            Route::post('edit/{id}', 'CategoriesController@postEditCategory');

            Route::get('delete/{id}', 'CategoriesController@getDeleteCategory');
        });

        Route::group(['prefix'=>'food'], function(){
            Route::get('/', 'FoodController@getFood');

            Route::get('add', 'FoodController@getAddFood');
            Route::post('add', 'FoodController@postAddFood');
        
            Route::get('edit/{id}', 'FoodController@getEditFood');
            Route::post('edit/{id}', 'FoodController@postEditFood');

            Route::get('delete/{id}', 'FoodController@getDeleteFood');
        });

        Route::group(['prefix'=>'employee'], function(){
            Route::get('/', 'EmployeeController@getEmployee');

            Route::get('add', 'EmployeeController@getAddEmployee');
            Route::post('add', 'EmployeeController@postAddEmployee');

            Route::get('edit/{id}', 'EmployeeController@getEditEmployee');
            Route::post('edit/{id}', 'EmployeeController@postEditEmployee');

            Route::get('delete/{id}', 'EmployeeController@getDeleteEmployee');
        });

        Route::group(['prefix'=>'order'], function(){
            Route::get('/', 'OrderController@getOrder');

            Route::get('update/{id}', 'OrderController@getUpdateOrder');
            Route::post('update/{id}', 'OrderController@postUpdateOrder');

            Route::get('delete/{id}', 'OrderController@getDeleteOrder');
        });

        Route::group(['prefix'=>'customer'], function(){
            Route::get('/', 'UserController@getCustomer');
            Route::get('delete/{id}', 'UserController@getDeleteCustomer');
        });

        Route::group(['prefix'=>'user'], function(){
            Route::get('/', 'UserController@getUser');

            Route::get('edit/{id}', 'UserController@getEditUser');
            Route::post('edit/{id}', 'UserController@postEditUser');
            
            Route::get('delete/{id}', 'UserController@getDeleteCustomer');
        });
    });
});

//front end
Route::group(['namespace'=>'frontend'], function(){
    Route::get('/', 'IndexController@index');
    Route::post('/load-more', 'LoadMoreController@postLoadMoreFood');

    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'IndexController@getCategory');

        Route::get('food/{id}', 'IndexController@getFoodCategory');
    });
    Route::get('food', 'IndexController@getFood');

    Route::get('search', 'IndexController@getSearch');

    Route::group(['prefix'=>'cart'], function(){
        Route::get('/', 'CartController@index');
        Route::get('add/{id}', 'CartController@getAddCart');
        Route::get('update', 'CartController@getUpdateCart');
        Route::get('remove', 'CartController@getRemoveCart');
        Route::get('delete', 'CartController@getDeleteCart');
    });

    //order
    Route::get('checkout', 'CartController@getCheckOut');
    Route::post('checkout', 'CartController@postCheckOut');

    //user-profile
    Route::group(['prefix'=>'user', 'middleware'=>'CheckLogedOut'], function(){
        Route::get('check-logout', 'UserProfileController@getLogout');


        Route::get('profile/{id}', 'UserProfileController@getUserProfile');
        Route::post('profile/{id}','UserProfileController@postUserProfile');

        //password
        Route::get('password/{id}', 'UserProfileController@getUserPassword');
        Route::post('password/{id}', 'UserProfileController@postUserPassword');

        //purchase
        Route::group(['prefix'=>'purchase'], function(){
            Route::get('{id}', 'UserProfileController@getUserPurchase');
            Route::get('cancel/{id}', 'UserProfileController@getCancelOrderPurchase');
    
            Route::get('get/order/{id}', 'UserProfileController@getOrderPurchase');
            Route::post('food-order', 'UserProfileController@showFoodOrderPurchase');

            //lọc order
            Route::get('ordered/{id}', 'UserProfileController@getOrderedPurchase');
            Route::get('on-delivery/{id}', 'UserProfileController@getOnDeliveryPurchase');
            Route::get('delivered/{id}', 'UserProfileController@getDeliveredPurchase');
            Route::get('cancelled/{id}', 'UserProfileController@getCancelledPurchase');   
        });

    });
});
