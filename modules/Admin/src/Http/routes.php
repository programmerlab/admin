<?php
   

    Route::get('admin/login','Modules\Admin\Http\Controllers\AuthController@index');
    Route::get('admin/forgot-password','Modules\Admin\Http\Controllers\AuthController@forgetPassword');
    Route::post('password/email','Modules\Admin\Http\Controllers\AuthController@sendResetPasswordLink');
    Route::get('admin/password/reset','Modules\Admin\Http\Controllers\AuthController@resetPassword');  
    Route::get('admin/logout','Modules\Admin\Http\Controllers\AuthController@logout');  

    Route::post('admin/login',function(App\Admin $user, \Illuminate\Http\Request $request){
   
    $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')]; 
    
   // $credentials = ['email' => 'kundan@gmail.com', 'password' => 123456]; 
    $auth = auth()->guard('admin'); 
        if ($auth->attempt($credentials)) {
            return Redirect::to('admin');
        }else{  
            return redirect()
                    ->back()
                        ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
            } 
    }); 
      
    

 
Route::group(['middleware' => ['admin']], function () { 
        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        /*------------User Model and controller---------*/
        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );


          Route::resource('admin/clientuser', 'Modules\Admin\Http\Controllers\ClientUsersController', [
            'names' => [
                'edit' => 'clientuser.edit',
                'show' => 'clientuser.show',
                'destroy' => 'clientuser.destroy',
                'update' => 'clientuser.update',
                'store' => 'clientuser.store',
                'index' => 'clientuser',
                'create' => 'clientuser.create',
            ]
                ]
        );


        
 
        Route::match(['get','post'],'admin/permission', 'Modules\Admin\Http\Controllers\RoleController@permission');

        /*----------End---------*/    
        
        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
              
  });
 
