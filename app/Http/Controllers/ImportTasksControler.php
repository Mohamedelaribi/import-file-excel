<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ImportTasks;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportTasksControler extends Controller
{
    public function import(Request $request){
        Excel::import(new ImportTasks, $request->file('file'));
        return back();
    }
}