<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ImportCombination;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportAppareilCombination extends Controller
{
    public function import(Request $request){
        Excel::import(new ImportCombination , $request->file('file'));
        return back();
    }
}