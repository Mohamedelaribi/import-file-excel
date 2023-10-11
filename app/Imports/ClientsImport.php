<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientsImport implements ToModel,WithValidation
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

     public function rules(): array
     {
         return [
             '0' => 'required',
             '1' => 'required',
             '2' => 'required',
             // Add more columns and rules as needed
         ];
     }

    public function model(array $row)

    {
        return new Client([
            'nomComplet' => $row['0'],
            'email_client' => $row['2'],
            'telephone_client' => $row['1'],
        ]);
    }

}