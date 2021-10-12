<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\exportAll;
use Maatwebsite\Excel\Facades\Excel;

class excelController extends Controller
{
    // function to export all the devices here
    public function exportDevices(){

        // return (new devicesExport)->download('devices.xlsx');
        return Excel::download(new exportAll, 'devices.xlsx');
    }

}
