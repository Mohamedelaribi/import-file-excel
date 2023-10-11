<?php

namespace App\Imports;

use App\Models\Article;
use App\Models\Endroit;
use App\Models\Modele;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAppareils implements ToModel
{
    private $model;
    private $appareil;

    public function __construct()
    {
        $this->model = Modele::all()->pluck('id', 'nameModele');
        $this->appareil = Article::select('id', 'serial_number')->get();
    }



    public function model(array $row)
    {

        $checkExistingAppareil = Article::where('serial_number', $row['1'])->first();
        if ($checkExistingAppareil) {
            $checkExistingAppareil->update([
                'serial_number' => $row['1'],
            ]);

        } else {
            $newAppareil =  Article::Create([
                'modele_id' => $this->model[$row[0]],
                'gps_principale' => 0,
                'proprietaire' => 0,
                'etat' => 1,
                'garantie' => 1,
                'serial_number' => $row[1],
                'numberBox' => 1000,
            ]);
            $newAppareil->endroits()->attach(5, ['utilisateur_id' => 16]);
        }
    }
}
