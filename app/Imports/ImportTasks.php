<?php

namespace App\Imports;

use App\Models\Article;
use App\Models\Client;
use App\Models\Tache;
use App\Models\Vehicule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

use function Laravel\Prompts\select;

class ImportTasks implements ToModel
{
    private $appareils;
    private $client;
    private $vehicule;

    public function  __construct(){
        $this->appareils = Article::select('id','serial_number')->get();
        $this->client = Client::select('id','nomComplet')->get();
        $this->vehicule = Vehicule::select('id','matricule')->get();
    }
    public function model(array $row)
    {
        $findVehicule = $this->vehicule->where('matricule', $row['0'])->first();
        $findAppareil = $this->appareils->where('serial_number', $row['1'])->first();
        $findClient = $this->client->where('nomComplet', $row['2'])->first();
        return new Tache([
            'createdBy_id' => 15,
            'user_id' => 21,
            'uti_utilsateur_id' => 16,
            'vehicule_id' =>$findVehicule->id,
            'article_id' =>$findAppareil->id,
            'client_id' =>$findClient->id,
            'catache_id' =>1,
            'etat_tache' =>2,
            'date_affectation' =>'2022-01-01',
            'date_previsionnelle_debut' =>'2022-01-01 00:00:00',
            'date_fin_realisation' =>'2022-01-01 00:00:00',
            'observation'=>'this task imported from CMS',
            'validation' =>1,
            'NotifificationStatus' => 0,
        ]);

   }
}