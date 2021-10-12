<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class importController extends Controller
{
    public function showImportForm(){
        return view('admin.importUser');
    }

    // import the ecel here
    public function importNewUsers(Request $request){
        request()->validate([
            'file'=>'required'
        ]);
        $data = new UsersImport;
        $file = $request->file('file')->store('imports');

        // Excel::import(new UsersImport, $file);
        Excel::import($data, $file);
        
        // get row counts here
        $totalImported = $data->getRowCount();

        request()->session()->put('total',$totalImported);

        session()->flash('imported','');

        return redirect('/users');
    }

}

