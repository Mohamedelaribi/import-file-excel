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
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv', // Validate the uploaded file
        ]);
        try {
            Excel::import(new ClientsImport, $request->file('file'));
            return back();
        } catch (\Exception $e) {
            // Log or display the exception message for debugging
        }
    }
}
