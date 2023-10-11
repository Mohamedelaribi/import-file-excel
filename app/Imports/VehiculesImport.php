<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\vehicule;
use Maatwebsite\Excel\Concerns\ToModel;

class VehiculesImport implements ToModel
{
   private $client;

   public function __construct (){
    $this->client = Client::all()->pluck('id', 'nomComplet');
   }
    public function model(array $row)
    {
        return new vehicule([
            'client_id'=>$this->client[$row[0]],
            'matricule'=>$row[1],
        ]);
    }
}