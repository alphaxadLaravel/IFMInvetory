<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\allocationController;
use App\Http\Controllers\deviceController;
use App\Http\Controllers\cartegoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\excelController;
use App\Http\Controllers\importController;


//Search Route
Route::post('search',[deviceController::class,'search']);

// grouping routes to ensure Admins are logged in to use system
Route::middleware(['prevent_back'])->group(function () {
    Route::middleware(['user'])->group(function () {
        
            // the dashboard route here
    Route::get('/', [DashboardController::class, 'dashCounts']);
    

    // user route here
    Route::get('/users', function () {
    return view('admin.users');
    });

    //Edit Department
    Route::get('department/{id}',[userController::class,'department']);

    //Update Department
    Route::post('newdepartment/{id}',[userController::class,'updatedepartment']);


    // adding the new user here
    Route::get('/newUser', function(){
    return view('admin.addUser');
    });

    // route towards the import page
    Route::get('/users/import', [importController::class, 'showImportForm']);

    // Route to import in database
    Route::post('/import', [importController::class, 'importNewUsers']);

    
    // the products route here
    Route::get('/devices', function () {
        return view('admin.devices');
    });

    // change the HDD details route here
    Route::get('/devices/single/hdd_changes/{id}', [DeviceController::class, 'showHDDForm']);

    // excel here
    Route::get('/import', [importController::class, 'importUser']);

    // change the hddsk now ..route here
    Route::post('/devices/single/hdd_changed/{id}', [DeviceController::class, 'changeHDD']);

    // route towards chnaging the user roles here
    Route::get('/users/change_role/{id}', [userController::class, 'rolePage']);

    // submitting the chnage role here
    Route::post('/users/role/{id}', [userController::class, 'changeRole']);

    // Update the device routr here
    Route::get('/devices/single/update_device/{id}', [DeviceController::class, 'showUpdateForm']);

    // update the device route here
    Route::post('/devices/single/update/{id}', [DeviceController::class, 'updateDevice']);
    
    // single device here
    Route::get('/single/{id}', [DeviceController::class, 'showDevice']);

    // adding device route here
    Route::get('/addItem', function () {
        return view('admin.addDevice');
    });

    //Route of devices in specific cartegories

    Route::get('specific/{id}',[DeviceController::class,'specific']);

    // view profile route here
    Route::get('/profile', function () {
        return view('admin.profile');
    });
  
    // re allocations
    Route::get('/allocations', function () {
        return view('admin.allocations');
    });

    //allocation history
    Route::get('hddchange',[DeviceController::class,'hddchange']);

    // the logout session destroyer here
    Route::get('/logout', function () {
        session()->forget('user');
        return redirect('/');
    });

    // allocate device route here
    Route::get('/allocate/{id}', [DeviceController::class, 'showForm']);

    // delete device route here
    Route::get('/delete/{id}', [DeviceController::class, 'deleteDevice']);

    // delete the allocation history here
    Route::get('/deleteHistory/{id}', [DeviceController::class, 'deleteHistory']);


    // allocating the device here
    Route::post('/newAllocation/{id}', [DeviceController::class, 'allocate']);

    // allocated device route here
    Route::get('/allocated/{id}',  [DeviceController::class, 'singleAllocated']);

    // cartegories routes here
    Route::get('/cartegory', function () {
        return view('admin.cartegory');
    });
    // cartegories adding route here
    Route::post('/addCartegory', [cartegoryController::class , 'newCartegory']);

    // search route here
    Route::get('/search', function () {
        return view('admin.search');
    });

    
    // Export any cartegory route here
    Route::get('/exports', function () {
        return view('admin.devicesExport');
    });

    // the coon users routes here
    // -------------------------------
       // user home here
       Route::get('/wellcome',[DashboardController::class, 'userDashboard']);

    // end of users routes here
    // --------------------------------
    });
});

   // exporting all the devices to excell format
   Route::get('/devices/export', [excelController::class, 'exportDevices']);
// login route here
Route::get('/log', function () {

    if(session()->has('user')){
      return view('admin.devices');
    }
    return view('outside.login');

});


// towards the forgot password
Route::get('/fogot', function () {
    return view('outside.fogot');
});

// login Route here
Route::post('/login', [LoginController::class, 'Login']);

// -----------------------------------------------------------//
// ---------------End of outside free routes----------------//
// -----------------------------------------------------------//






