<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\VehiculesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportVehiculesController extends Controller
{
    public function import(Request $request){

        Excel::import(new VehiculesImport, $request->file('file'));
        return back();
    }
}