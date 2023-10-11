<?php

namespace App\Models;

use App\Models\Modele;
use App\Models\Endroit;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable= [
        'modele_id',
        'gps_principale',
        'proprietaire',
        'etat',
        'garantie',
        'serial_number',
        'numberBox',
    ];

    public function endroits()
    {
        return $this->belongsToMany(Endroit::class);
    }


    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'article_vehicule', 'article_id', 'vehicule_id');
    }

    public function modeles()
    {
        return $this->belongsTo(Modele::class, 'modele_id');
    }

    public function articlesCombination()
    {
        return $this->belongsToMany(self::class, 'article_combination', 'article_id', 'art_article_id')->withTimestamps()->latest('article_combination.created_at');;
    }
    public function articlePrencipal()
    {
        return $this->belongsToMany(self::class, 'article_combination', 'art_article_id', 'article_id');
    }

}
