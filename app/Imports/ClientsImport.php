<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    private $clients;

    public function __construct()
    {
        $this->clients = Client::select('nomComplet')->get();
    }

    // public function rules(): array
    // {
    //     // return [
    //     //     '0' => 'required',
    //     //     '1' => 'required',
    //     //     '2' => 'required',
    //     //     // Add more columns and rules as needed
    //     // ];
    // }

    public function model(array $row)

    {
        $checkExistingClient = client::where('nomComplet', $row['0'])->first();
        if ($checkExistingClient) {
            $checkExistingClient->update([
                'nomComplet' => $row['0'],
            ]);
        } else {
            return new Client([
                'nomComplet' => $row['0'],
            ]);
        }
    }
}