<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ImportAppareils;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportAppareilsController extends Controller
{
    public function import(Request $request){
        Excel::import(new ImportAppareils, $request->file('file'));
        return back();
    }
}