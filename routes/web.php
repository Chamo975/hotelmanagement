<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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
    return view('frontend.frontmaster');
});




    //admin routess
    Route::group(['middleware'=>['auth','admin']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    //regiater role routes
    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::post('/role-register','Admin\DashboardController@deleteregisterrole');
  

    //floor routes
    Route::get('/floor','Admin\floorController@floor');
    Route::post('/getByfloorId','Admin\floorController@getByfloorId');
    Route::post('/savefloor','Admin\floorController@savefloor');
    Route::post('/editfloor','Admin\floorController@editfloor');
    Route::post('/deletefloor','Admin\floorController@deletefloor');


    //Room type Routes
    Route::get('/roomtype','Admin\RoomTypeController@roomtype');
    Route::post('/saveroomtype','Admin\RoomTypeController@saveroomtype');
    Route::post('/getByroomtypeId','Admin\RoomTypeController@getByroomtypeId');
    Route::post('/editroomtype','Admin\RoomTypeController@editroomtype');
    Route::post('/deleteroomtype','Admin\RoomTypeController@deleteroomtype');
    

   

    //room
    Route::get('/rooms','Admin\RoomController@room');
    Route::post('/saveroom','Admin\RoomController@saveroom');
    Route::post('/getByroomId','Admin\RoomController@getByroomId');
    Route::post('/editroom','Admin\RoomController@editroom');
    Route::post('/deleteroom','Admin\RoomController@deleteroom');

    //amenity routes
    Route::get('/amenity','Admin\AmenityController@amenities');
    Route::post('/saveamenity','Admin\AmenityController@saveAmenity');
    Route::post('/getByamenityId','Admin\AmenityController@getByamenityId');
    Route::post('/editamenity','Admin\AmenityController@editamenity');
    Route::post('/deleteamenity','Admin\AmenityController@deleteamenity');


    //housekeeping Routes
    Route::get('/housekeepingstatus','Admin\HousekeepingStatusController@hstatus');
    Route::post('/savehousekeepingstatus','Admin\HousekeepingStatusController@savehousekeepingstatus');
    Route::post('/getByhouskeepingsId','Admin\HousekeepingStatusController@getByhouskeepingsId');
    Route::post('/edithouskeepings','Admin\HousekeepingStatusController@edithouskeepings');
    Route::post('/deletehousekeepings','Admin\HousekeepingStatusController@deletehousekeepings');

    //departmnet routes
    Route::get('/department','Admin\DepartmentController@department');
    Route::post('/savedepartment','Admin\DepartmentController@savedepartment');
    Route::post('/getBydepartmentId','Admin\DepartmentController@getBydepartmentId');
    Route::post('/editdepartment','Admin\DepartmentController@editdepartment');
    Route::post('/deletedepartment','Admin\DepartmentController@deletedepartment');

    //designation routes
    Route::get('/designation','Admin\DesignationController@designation');
    Route::post('/getBydesignationId','Admin\DesignationController@getBydesignationId');
    Route::post('/editdesignation','Admin\DesignationController@editdesignation');
    Route::post('/savedesignation','Admin\DesignationController@savedesignation');
    Route::post('/deletedesignation','Admin\DesignationController@deletedesignation');

    //employee routes
    Route::get('/employee','Admin\EmployeeController@employees');
    Route::post('/getByemployeeId','Admin\EmployeeController@getByemployeeId');
    Route::post('/editemployee','Admin\EmployeeController@editemployee');
    Route::post('/saveemployee','Admin\EmployeeController@saveemployee');
    Route::post('/deleteemployee','Admin\EmployeeController@deleteemployee');
    

    //halltype routes
    Route::get('/halltype','Admin\HallTypeController@halltype');
    Route::post('/getByhalltypeId','Admin\HallTypeController@getByhalltypeId');
    Route::post('/edithalltype','Admin\HallTypeController@edithalltype');
    Route::post('/savehalltype','Admin\HallTypeController@savehalltype');
    Route::post('/deletehalltype','Admin\HallTypeController@deletehalltype');
    

    //hall routes
    Route::get('/hall','Admin\HallController@hall');
    Route::post('/savehall','Admin\HallController@savehall');
    Route::post('/deletehall','Admin\HallController@deletehall');

    //paidservices routes
    Route::get('/paidservices','Admin\PaidServicesController@paidservices');
    Route::post('/getByemployeeId','Admin\PaidServicesController@getBypaidservicesId');
    Route::post('/editemployee','Admin\PaidServicesController@editpaidservices');
    Route::post('/savepaidservices','Admin\PaidServicesController@savepaidservices');
    Route::post('/deletepaidservices','Admin\PaidServicesController@deletepaidservices');




    //coupanmagement
    Route::get('/coupanmagement','Admin\CouponManagementController@coupanmagement');
    Route::post('/getBycoupanmanagementId','Admin\CouponManagementController@getBycoupanmanagementId');
    Route::post('/editcoupanmanegment','Admin\CouponManagementController@editcoupanmanagement');
    Route::post('/savecoupanmanagement','Admin\CouponManagementController@savecoupanmanagement');
    Route::post('/deletecoupanmanagement','Admin\CouponManagementController@deletecoupanmanagement');





    //price manager
    Route::get('/pricemanager','Admin\PriceManagerController@pricemanager');




    //email routes
    Route::get('/contact','Admin\SendMailController@contact');
    Route::post('/contact','Admin\SendMailController@contactSubmit')->name('contact.submit');

   

    //calander routes
    Route::get('/fullcalendar','Admin\CalanderController@calender');
    Route::get('/fullcalendar/create','Admin\CalanderController@create');
    Route::post('/fullcalendar/update','Admin\CalanderController@update');
    Route::post('/fullcalendar/delete','Admin\CalanderController@destroy');

    //booking

    Route::get('/booking','Admin\BookingController@booking');
    // Route::get('/fullcalendar/create','Admin\CalanderController@create');
    // Route::post('/fullcalendar/update','Admin\CalanderController@update');
    // Route::post('/fullcalendar/delete','Admin\CalanderController@destroy');



    //guest Routes
       Route::get('/guest','Admin\GuestController@guest');
    // Route::get('/fullcalendar/create','Admin\CalanderController@create');
    // Route::post('/fullcalendar/update','Admin\CalanderController@update');
    // Route::post('/fullcalendar/delete','Admin\CalanderController@destroy');


    //booked Rooms
    Route::get('/bookedroom','Admin\BookedRoomController@bookedroom');



    
    //booked halls
    Route::get('/bookedhall','Admin\BookedHallController@bookedhall');
});

//map routes
Route::get('/map','Admin\MapController@map');



//receptionist Routes
   Route::group(['middleware'=>['auth','receptionist']], function(){

    Route::get('/receptionistdashboard', function () {
        return view('receptionist.receptionistdashboard');
    });
});



            Auth::routes(['verify' => true]);

        Route::get('/home', 'HomeController@index')->name('home');
