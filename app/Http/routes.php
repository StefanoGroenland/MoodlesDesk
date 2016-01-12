<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Routes for user eyes only
Route::group(['middleware' => 'auth'], function () {


//    UserController Routes

//    global ones
    Route::get('/profiel', array('as' => 'profiel', 'uses' => 'UserController@showProfiel'));
    Route::put('/updateProfiel', array('as' => 'upd_profile', 'uses' => 'UserController@updateProfiel'));
    Route::put('/profiel/upload', 'UserController@upload');


//    klant routes
    Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'UserController@showDashboard'));

    Route::group(['middleware' => 'isAdmin'], function(){
        Route::get('/klantmuteren/{id}', array('as' => 'kmuteren', 'uses' =>'UserController@showKlantMuteren'));
        Route::get('/newklant', array('as' => 'klantmuteren', 'uses' =>'UserController@showNewKlant'));
        Route::post('/updateKlantData', array('as' => 'klantdata', 'uses' => 'UserController@getKlantData'));
        Route::put('/updateKlant', array('as' => 'veranderk', 'uses' => 'UserController@updateKlant'));
        Route::post('addUser', 'UserController@addUser');
        Route::get('/klanten', 'UserController@showKlantenOverzicht');

        //    medewerker routes
        Route::get('/admindashboard', array('as' => 'admindashboard', 'uses' => 'UserController@showDashboard'));
        Route::get('/medewerkermuteren/{id}', array('as' => 'mwmuteren', 'uses' =>'UserController@showMwMuteren'));
        Route::get('/newmedewerker', array('as' => 'newmw', 'uses' =>'UserController@showNewMedewerker'));
        Route::put('/updateMedewerker', array('as' => 'veranderMw', 'uses' => 'UserController@updateMedewerker'));
        Route::post('/updateData', array('as' => 'updateData', 'uses' => 'UserController@getUpdateData'));
        Route::post('addMedewerker', 'UserController@addMedewerker');
        Route::get('/medewerkers', 'UserController@showMedewerkersOverzicht');
        Route::delete('/verwijderGebruiker/{id}', 'UserController@verwijderGebruiker');
        Route::put('/resetUserPassword', 'UserController@resetUserPassword');


        //    ProjectController Routes
        Route::get('/newproject', array('as' => 'nieuwproject', 'uses' => 'ProjectController@showNewProject'));
        Route::get('/projectmuteren/{id}', array('as' => 'projectmuteren', 'uses' => 'ProjectController@showProjectMuteren'));
        Route::put('/updateProject/{id}', array('as' => 'veranderPJ', 'uses' => 'ProjectController@updateProject'));
        Route::post('/updateProjectData', array('as' => 'updateData', 'uses' => 'ProjectController@getUpdateData'));
        Route::delete('/verwijderProject/{id}', 'ProjectController@verwijderProject');
        Route::post('/addProject', 'ProjectController@addProject');
        Route::get('/projecten', 'ProjectController@showProjectenOverzicht');

        //    BugController Routes
        Route::delete('/verwijderBug/{id}', 'BugController@verwijderBug');
        Route::put('/updateBug/{id}',array('as' => 'updateBug', 'uses' => 'BugController@updateBug'));
    });

    Route::get('/bugmuteren/{id}', array('as' => 'bugmuteren', 'uses' => 'BugController@showBugMuteren'));

    Route::get('/bugchat/{id}',array('as' => 'bugchat', 'uses' => 'BugController@showbugChat'));
    Route::post('/addBug/{id}', 'BugController@addBug');
    Route::post('/upload', 'BugController@upload');
    Route::get('/bugoverzicht/{id}', array('as' => 'bugoverzicht', 'uses' => 'BugController@showBugOverzicht'));
    Route::get('/bugs/{id}', array('as' => 'bugoverzicht', 'uses' => 'BugController@showBugOverzichtPerProject'));

//    ChatController Routes
    Route::post('/sendMessage', 'ChatController@sendMessage');
    Route::get('/refreshChat/{id}',array('as' => 'bugchat', 'uses' => 'BugController@refreshChat'));
    Route::get('/feedCount/{id}',array('as' => 'feed_count', 'uses' => 'BugController@feedCount'));

});

//unrestricted routes
Route::get('/', 'UserController@showWelcome');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::controllers([
    'wachtwoord' => 'Auth\PasswordController',
]);

// Password reset link request routes...
Route::get('auth/email', 'Auth\PasswordController@getEmail');
Route::post('auth/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('auth/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('auth/reset', 'Auth\PasswordController@postReset');