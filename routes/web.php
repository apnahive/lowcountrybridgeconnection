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
//use Auth;

Route::get('/', function () {
    //return view('welcome');
    if (Auth::check())
	{
		return Redirect::to('profile');
	}
	else
	{
		return view('welcome');	
	}
});

Auth::routes();

//unitadmin
Route::post('/unitpassword/email','Auth\UnitForgotPasswordController@sendResetLinkEmail')->name('unit.password.email');
Route::get('/unitpassword/reset','Auth\UnitForgotPasswordController@showLinkRequestForm')->name('unit.password.request');
Route::post('/unitpassword/reset','Auth\UnitResetPasswordController@reset');
Route::get('/unitpassword/reset/{token}','Auth\UnitResetPasswordController@showResetForm')->name('unit.password.reset');
//teacher
Route::post('/teacherpassword/email','Auth\TeacherForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
Route::get('/teacherpassword/reset','Auth\TeacherForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
Route::post('/teacherpassword/reset','Auth\TeacherResetPasswordController@reset');
Route::get('/teacherpassword/reset/{token}','Auth\TeacherResetPasswordController@showResetForm')->name('teacher.password.reset');
//manager
Route::post('/managerpassword/email','Auth\ManagerForgotPasswordController@sendResetLinkEmail')->name('manager.password.email');
Route::get('/managerpassword/reset','Auth\ManagerForgotPasswordController@showLinkRequestForm')->name('manager.password.request');
Route::post('/managerpassword/reset','Auth\ManagerResetPasswordController@reset');
Route::get('/managerpassword/reset/{token}','Auth\ManagerResetPasswordController@showResetForm')->name('manager.password.reset');



//members 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/classlist', 'HomeController@showClass')->name('classlist');
Route::get('/series_details/{id}', 'HomeController@showSeries')->name('serieslist');
Route::get('/series_enroll/{id}', 'HomeController@seriesSubscription')->name('seriesbook');
Route::get('/series_enrollment', 'HomeController@seriesEnroll')->name('seriesenroll');
Route::get('/series_enrollment/{id}', 'HomeController@seriesEnrolls')->name('seriesenrolls');

Route::get('/gamelist', 'HomeController@showGame')->name('gamelist');
Route::get('/profile', 'HomeController@showProfile')->name('profile');
Route::get('/contact', 'HomeController@showContact')->name('contact');
Route::post('/sendmessage', 'HomeController@messagex')->name('messagex');

Route::get('/news', 'HomeController@showNews')->name('news');
Route::get('/email', 'HomeController@email')->name('sendEmail');
Route::resource('profiles', 'ProfileController');
Route::resource('workshops', 'WorkshopController');
Route::resource('club_subscription', 'Club_subscriptionController');
Route::resource('class_enrollment', 'Class_subscriptionController');
Route::get('class_details/{id}', 'Class_subscriptionController@show')->name('class_details.show');
Route::resource('game_enrollment', 'Game_subscriptionController');
Route::get('game_details/{id}', 'Game_subscriptionController@show')->name('game_details.show');

Route::get('/waitlist', 'HomeController@showWaiting')->name('waitlist');








//teacher
Route::get('/teacher/login', 'TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'TeacherLoginController@login')->name('teacher.login.submit');
//Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('classes/creates/{id}', 'ClassroomController@creates')->name('classes.creates');
Route::get('classes/delete_flyer/{id}', 'ClassroomController@delete_flyer')->name('classes.flyer');
Route::resource('classes', 'ClassroomController');


Route::get('/class/delete/{id}', 'ClassroomController@destroy');

Route::resource('teacher', 'TeacherController');
Route::resource('manage_students', 'PlayerController');
Route::post('manage_student', 'PlayerController@search')->name('manage_student.search');
Route::resource('playerclass', 'Playerclass_subscriptionController');
Route::get('student/{id}/add', 'Playerclass_subscriptionController@edit')->name('playerclass.add');

Route::get('studentselect', 'Playerclass_subscriptionController@select')->name('playerclass.select');
Route::post('playerclasss', 'Playerclass_subscriptionController@store1')->name('playerclass.store1');
Route::post('playerclass', 'Playerclass_subscriptionController@store')->name('playerclass.store');
Route::get('playerclasss', 'Playerclass_subscriptionController@create1')->name('playerclass.create1');
Route::get('/playerclass/delete/{id}', 'Playerclass_subscriptionController@destroy');
Route::get('/playerclass_cancel_enrollment/delete/{id}', 'Playerclass_subscriptionController@destroy1');

Route::resource('classwaiting', 'ClasswaitingController');
Route::get('series/delete_flyer/{id}', 'Class_seriesController@delete_flyer')->name('series.flyer');
Route::resource('series', 'Class_seriesController');
Route::get('/seriess/delete/{id}', 'Class_seriesController@destroy');


Route::get('series_class/{id}/editc', 'Series_classesController@editc')->name('series_class.editc');
Route::get('series_class/save/{id}', 'Series_classesController@save')->name('series_class.save');

Route::resource('series_class', 'Series_classesController');
Route::resource('userclass', 'UserclassController');
Route::get('students/{id}/add', 'UserclassController@edit')->name('userclass.add');
//Route::post('series_classs/{id}', 'Series_classesController@create')->name('series_class.create');



//Route::post('cancelclass', 'Playerclass_subscriptionController@cancelclass')->name('playerclass.cancelclass');

//manager

//Route::get('/manager', 'ManagerController@index')->name('manager');
Route::get('/manager/login', 'ManagerLoginController@showLoginForm')->name('manager.login');
Route::post('/manager/login', 'ManagerLoginController@login')->name('manager.login.submit');
Route::get('/manager', 'ManagerController@index')->name('manager');
Route::resource('games', 'GameController');
Route::get('/game/delete/{id}', 'GameController@destroy');
Route::resource('manager', 'ManagerController');

Route::resource('playergame', 'Playergame_subscriptionController');

//Route::get('playermanagers/{id}/save', 'PlayermanagerController@save')->name('playermanager.save');
//Route::get('playersmanagers/{id}/add', 'PlayersmanagersController@create')->name('playermanager.add');
Route::post('playermanagers', 'PlayermanagerController@search')->name('playermanager.search');
//Route::resource('playersmanagers', 'PlayersmanagersController');
Route::resource('playermanager', 'PlayermanagerController');



Route::get('Usermanager/{id}/add', 'UsermanagerController@edit')->name('Usermanager.add');
Route::resource('Usermanager', 'UsermanagerController');
Route::post('playergames', 'Playergame_subscriptionController@store1')->name('playergame.store1');
Route::post('playergame', 'Playergame_subscriptionController@store')->name('playergame.store');
Route::get('playergames', 'Playergame_subscriptionController@create1')->name('playergame.create1');
Route::get('playerselect', 'Playergame_subscriptionController@select')->name('playergame.select');
Route::get('/playergame/delete/{id}', 'Playergame_subscriptionController@destroy');
Route::get('/playergame_cancel_enrollment/delete/{id}', 'Playergame_subscriptionController@destroy1');

Route::resource('gamewaiting', 'GamewaitingController');

Route::get('tournament/delete_flyer/{id}', 'TournamentController@delete_flyer')->name('tournament.flyer');
Route::resource('tournament', 'TournamentController');
Route::get('/tournament/delete/{id}', 'TournamentController@destroy');
Route::resource('special_game', 'Special_gameController');
Route::get('/special_game/delete/{id}', 'Special_gameController@destroy');




//unitadmin
Route::get('/unitadmin/login', 'UnitAdminLoginController@showLoginForm')->name('unitadmin.login');
Route::post('/unitadmin/login', 'UnitAdminLoginController@login')->name('unitadmin.login.submit');
//Route::get('/unitadmin', 'UnitadminController@index')->name('unitadmin');
Route::resource('clubs', 'ClubController');
Route::get('/clubs/delete/{id}', 'ClubController@destroy');

Route::get('unitclass/creates/{id}', 'UnitclassController@creates')->name('unitclass.creates');
Route::get('unitclass/delete_flyer/{id}', 'UnitclassController@delete_flyer')->name('unitclass.flyer');
Route::resource('unitclass', 'UnitclassController');
Route::get('/unitsclass/delete/{id}', 'UnitclassController@destroy');


Route::resource('unitgame', 'UnitgameController');
Route::get('/unitsgame/delete/{id}', 'UnitgameController@destroy');

Route::get('managerlist', 'UnitmanagerController@index')->name('unitmanagers.index');
Route::resource('unitmanager', 'UnitmanagerController');
Route::get('/unitmanager/delete/{id}', 'UnitmanagerController@destroy');



Route::resource('unitadmins', 'UnitadminController');


Route::resource('unitclass_subscription', 'Unitclass_subscriptionController');
Route::get('studentsselect', 'Unitclass_subscriptionController@select')->name('unitclass_subscription.select');
Route::post('unitclass_subscriptions', 'Unitclass_subscriptionController@store1')->name('unitclass_subscription.store1');

Route::post('unitclass_subscription', 'Unitclass_subscriptionController@store')->name('unitclass_subscription.store');
Route::get('unitclass_subscriptions', 'Unitclass_subscriptionController@create1')->name('unitclass_subscription.create1');
Route::get('/unitclass_subscriptionss/delete/{id}', 'Unitclass_subscriptionController@destroy');
Route::get('/unitclass_cancel_enrollment/delete/{id}', 'Unitclass_subscriptionController@destroy1');



Route::resource('unitgame_subscription', 'Unitgame_subscriptionController');
Route::get('playersselect', 'Unitgame_subscriptionController@select')->name('unitgame_subscription.select');
Route::post('unitgame_subscriptions', 'Unitgame_subscriptionController@store1')->name('unitgame_subscription.store1');
Route::post('unitgame_subscription', 'Unitgame_subscriptionController@store')->name('unitgame_subscription.store');
Route::get('unitgame_subscriptions', 'Unitgame_subscriptionController@create1')->name('unitgame_subscription.create1');
Route::get('/unitgame_subscriptionss/delete/{id}', 'Unitgame_subscriptionController@destroy');

Route::get('/unitgame_cancel_enrollment/delete/{id}', 'Unitgame_subscriptionController@destroy1');

Route::get('student_playerlist', 'PlayerunitController@index')->name('playerunits.index');
Route::resource('playerunit', 'PlayerunitController');
Route::get('/playerunits/delete/{id}', 'PlayerunitController@destroy');
Route::post('student_playerlists', 'PlayerunitController@search')->name('playerunit.search');
//Route::post('upload-record', 'PlayerunitController@record1')->name('playerunit.record1');


Route::resource('member', 'MemberController');
Route::get('/members/delete/{id}', 'MemberController@destroy');
Route::post('members', 'MemberController@search')->name('member.search');
Route::resource('unitclasswaiting', 'Unit_classwaitController');
Route::resource('unitgamewaiting', 'UnitgamewaitController');


Route::get('unitseries/delete_flyer/{id}', 'UnitseriesController@delete_flyer')->name('unitseries.flyer');
Route::resource('unitseries', 'UnitseriesController');
Route::get('/unitseriess/delete/{id}', 'UnitseriesController@destroy');
Route::resource('memberclass', 'MemberclassController');
Route::post('memberclasss', 'MemberclassController@search')->name('memberclass.search');





Route::get('unitseries_class/{id}/editc', 'Unitseries_classController@editc')->name('unitseries_class.editc');
Route::get('unitseries_class/save/{id}', 'Unitseries_classController@save')->name('unitseries_class.save');

Route::resource('unitseries_class', 'Unitseries_classController');

Route::get('unittournament/delete_flyer/{id}', 'UnittournamentController@delete_flyer')->name('unittournament.flyer');
Route::resource('unittournament', 'UnittournamentController');
Route::get('/unittournament/delete/{id}', 'UnittournamentController@destroy');
Route::resource('unitspecial_game', 'Unitspecial_gameController');
Route::get('/unitspecial_game/delete/{id}', 'Unitspecial_gameController@destroy');


//Route::resource('unitclasswaiting', 'UnitclasswaitingController');

Route::resource('unituserclass', 'UnituserclassController');
Route::resource('unitusergame', 'UnitusergameController');


Route::get('teacherlist', 'UserlistController@index')->name('userlists.index');
Route::get('/userlists/delete/{id}', 'UserlistController@destroy');
Route::resource('userlist', 'UserlistController');
Route::post('unitadmin', 'UnitadminController@store')->name('unitadmin.store');
Route::post('unitadminn', 'UnitadminController@store1')->name('unitadmin.store1');
Route::get('unitadmin', 'UnitadminController@create1')->name('unitadmin.create1');




//superadmin
Route::get('/superadmin/login', 'SuperAdminLoginController@showLoginForm')->name('superadmin.login');
Route::post('/superadmin/login', 'SuperAdminLoginController@login')->name('superadmin.login.submit');
//Route::get('/superadmin', 'SuperadminController@index')->name('superadmin');

Route::resource('superadmins', 'SuperadminController');

Route::get('superclass/creates/{id}', 'SuperclassController@creates')->name('superclass.creates');
Route::get('superclass/delete_flyer/{id}', 'SuperclassController@delete_flyer')->name('superclass.flyer');
Route::resource('superclass', 'SuperclassController');
Route::get('/supersclass/delete/{id}', 'SuperclassController@destroy');

Route::resource('supergame', 'SupergameController');
Route::get('/supersgame/delete/{id}', 'SupergameController@destroy');

Route::resource('superclass_subscription', 'Superclass_subscriptionController');
Route::post('superclass_subscriptions', 'Superclass_subscriptionController@store1')->name('superclass_subscription.store1');
Route::post('superclass_subscription', 'Superclass_subscriptionController@store')->name('superclass_subscription.store');
Route::get('superclass_subscriptions', 'Superclass_subscriptionController@create1')->name('superclass_subscription.create1');
Route::get('/superclass_subscription/delete/{id}', 'Superclass_subscriptionController@destroy');
Route::get('/superclass_cancel_enrollment/delete/{id}', 'Superclass_subscriptionController@destroy1');

Route::resource('supergame_subscription', 'Supergame_subscriptionController');
Route::post('supergame_subscriptions', 'Supergame_subscriptionController@store1')->name('supergame_subscription.store1');
Route::post('supergame_subscription', 'Supergame_subscriptionController@store')->name('supergame_subscription.store');
Route::get('supergame_subscriptions', 'Supergame_subscriptionController@create1')->name('supergame_subscription.create1');
Route::get('/supergame_subscription/delete/{id}', 'Supergame_subscriptionController@destroy');
Route::get('/supergame_cancel_enrollment/delete/{id}', 'Supergame_subscriptionController@destroy1');

Route::resource('playersuper', 'PlayersuperController');


//superadmin
Route::get('/superadmin/login', 'SuperAdminLoginController@showLoginForm')->name('superadmin.login');
Route::post('/superadmin/login', 'SuperAdminLoginController@login')->name('superadmin.login.submit');
Route::get('/superadmin', 'SuperadminController@index')->name('superadmin');




Route::get('/staff', 'StaffController@index')->name('staff');





Route::resource('categories', 'Class_categoryController');
Route::get('/categoriess/delete/{id}', 'Class_categoryController@destroy');

Route::post('subscription', 'Class_subscriptionController@cancelsubscription')->name('subscription.cancelsubscription');

Route::post('superadmin', 'SuperadminController@store')->name('superadmin.store');



//new routes
Route::get('superseries/delete_flyer/{id}', 'SuperseriesController@delete_flyer')->name('superseries.flyer');
Route::get('/superseriess/delete/{id}', 'SuperseriesController@destroy');
Route::resource('superseries', 'SuperseriesController');

Route::get('supertournament/delete_flyer/{id}', 'SupertournamentController@delete_flyer')->name('supertournament.flyer');
Route::resource('supertournament', 'SupertournamentController');
Route::get('/supertournament/delete/{id}', 'SupertournamentController@destroy');

Route::resource('superspecialgame', 'SuperspecialgamesController');
Route::get('/superspecialgame/delete/{id}', 'SuperspecialgamesController@destroy');

Route::resource('superclasswaiting', 'SuperclasswaitController');
Route::resource('supergamewaiting', 'SupergamewaitController');

Route::get('superseries_class/{id}/editc', 'Superseries_classController@editc')->name('superseries_class.editc');
Route::get('superseries_class/save/{id}', 'Superseries_classController@save')->name('superseries_class.save');

Route::resource('superseries_class', 'Superseries_classController');

Route::resource('superplayers', 'SuperplayerController');
Route::post('superplayer', 'SuperplayerController@search')->name('superplayers.search');

Route::resource('superuserclass', 'SuperuserclassController');
Route::resource('superusergame', 'SuperusergameController');

Route::resource('supermanager', 'SupermanagerController');
Route::get('/supermanager/delete/{id}', 'SupermanagerController@destroy');

Route::resource('superteacher', 'SuperteacherController');
Route::get('/superteacher/delete/{id}', 'SuperteacherController@destroy');

Route::resource('superunit', 'SuperunitController');
Route::get('/superunit/delete/{id}', 'SuperunitController@destroy');





//secure public pdf code

/*Route::get('class_flyer/{slug}', [
     'middleware' => 'auth',
]);*/
/*Route::get('/class_flyer/{*.pdf}', function () {
    if(!auth()->user()) {
        return 'unauthorized';
    }
    // if authenticated try to look for the file with requested path and return its content
    return File::get(public_path(ltrim($_SERVER['REQUEST_URI'],'/')));
})->where(['path' => '.*']);*/
// Route::get('/flyer/class_flyer/{path?}', function () {
//     if(\Auth::check()) {
//         // 21 = characters count of "templates/sb-admin-2"
//         $newPath = substr(ltrim($_SERVER['REQUEST_URI'], '/'), 21);
//         return \File::get(
//             public_path('/class_flyer/' . $newPath)
//         );
//     }
//     return 'access denied';
// })->where(['path' => '.*']);

/*Route::any( '(.*)', function( $page ){
    dd('route');
});*/


//});tournament

Route::get('flyer/tournament/{filename}', 'GetflyerController@gettournament')->name('tournamentflyer');
Route::get('flyer/class/{filename}', 'GetflyerController@getclass')->name('classflyer');    
Route::get('flyer/series/{filename}', 'GetflyerController@getseries')->name('seriesflyer');


/*Route::get('flyer/usertournament/{filename}', 'HomeController@gettournament')->name('tournamentflyeruser');
Route::get('flyer/userseries/{filename}', 'HomeController@getseries')->name('seriesflyeruser');
Route::get('flyer/userclass/{filename}', 'HomeController@getclass')->name('classflyeruser');
Route::get('flyer/unitclass/{filename}', 'UnitclassController@getclass')->name('classflyerunit');    
Route::get('flyer/unitseries/{filename}', 'UnitseriesController@getseries')->name('seriesflyerunit');
Route::get('flyer/unittournament/{filename}', 'UnittournamentController@gettournament')->name('tournamentflyerunit');


Route::get('flyer/superclass/{filename}', 'SuperclassController@getclass')->name('classflyersuper');    
Route::get('flyer/superseries/{filename}', 'SuperseriesController@getseries')->name('seriesflyersuper');
Route::get('flyer/supertournament/{filename}', 'SupertournamentController@gettournament')->name('tournamentflyersuper');*/




//Route::put('profile/{id}', 'ProfileController@update1')->name('profiles.update1');

//Route::get('/classes/edit/{class1}', 'ClassroomController@edit');
//Route::get('/classes/show/{id}', 'ClassroomController@edit');

//Route::resource('classes', 'ClassroomController', ['only' => [
//    'index', 'show', 'edit'
//]]);


//file download
Route::get('download-excel-file/{type}', array('as'=>'excel-files','uses'=>'FileController@downloadExcelFile'));
Route::get('blank-template/{type}', array('as'=>'blank-template','uses'=>'FileController@downloadBlank'));
Route::get('download-member/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadMember'));
Route::get('class-excel-file/{type}', array('as'=>'class-files','uses'=>'FileController@downloadClass'));
Route::get('game-excel-file/{type}', array('as'=>'game-files','uses'=>'FileController@downloadGame'));
Route::get('download-user-report/{type}', array('as'=>'user-report','uses'=>'FileController@downloadUserReport'));
Route::get('download-workshop-report/{type}', array('as'=>'workshop-report','uses'=>'FileController@downloadWorkshop'));
Route::get('download-mailing-report/{type}', array('as'=>'mail-report','uses'=>'FileController@downloadMailReport'));
//file import
Route::post('import-csv-excel',array('as'=>'import-csv-excels','uses'=>'FileController@importFileIntoDB'));
Route::post('import-member',array('as'=>'import-csv-excel','uses'=>'FileController@importMember'));




//emaillers
Route::get('welcome-mail','UserController@welcomeMail');