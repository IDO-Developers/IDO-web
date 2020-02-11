<?php
use Illuminate\Http\Request;


Route::group(['prefix' => 'auth'], function () {


    Route::get('lista', 'AuthController@lista');

    Route::post('iniciarApp', 'AuthControllerApp@iniciarApp') ;
    Route::post('signupApp', 'AuthControllerApp@signupApp') ;

    Route::get('infoAlumno/{RNE_Alumno}', 'AuthControllerApp@infoAlumno');

    Route::get('filaGrupos/{RNE_Alumno}', 'AuthControllerApp@filaGrupos');
    Route::get('matricula/{RNE_Alumno}', 'AuthControllerApp@matricula');





    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
