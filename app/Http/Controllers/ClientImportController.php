<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientImportController extends Controller
{
    public function importClient(Request $request)
    {
        Excel::import(new ClientsImport, $request->file('file'));
        return back();
    }
}
