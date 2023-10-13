<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Vehicule;
use Maatwebsite\Excel\Concerns\ToModel;

class VehiculesImport implements ToModel
{
   private $client;

   public function __construct (){
    $this->client = Client::all()->pluck('id', 'nomComplet');
   }
    public function model(array $row)
    {
        $checkExistingVehicule = Vehicule::where('matricule', $row['1'])->first();
        if (!$checkExistingVehicule){
             return new Vehicule([
            'client_id'=>$this->client[$row[0]],
            'matricule'=>$row[1],
        ]);
        }

    }
}