<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCombination implements ToModel
{
    private $appareil;
    public function __construct()
    {
        $this->appareil = Article::select('id', 'serial_number')->get();
    }
    public function model(array $row)
    {
        // dd($this->appareil);
        $checkExistingAppareil = $this->appareil->where('serial_number', $row['0'])->first();

        $sim = $this->appareil->where('serial_number', $row['1'])->first();
        if ($checkExistingAppareil) {
            // $checkExistingAppareil->update([
            //     'serial_number' => $row['0'],
            // ]);
            $checkExistingAppareil->articlesCombination()->attach($sim);
        }
    }
}