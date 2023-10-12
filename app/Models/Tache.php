<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Article;
use App\Models\Catache;
use App\Models\Imgtache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        'createdBy_id',
        'user_id',
        'uti_utilsateur_id',
        'vehicule_id',
        'article_id',
        'client_id',
        'catache_id',
        'etat_tache',
        'date_affectation',
        'date_previsionnelle_debut',
        'date_fin_realisation',
        'observation',
        'validation',
        'NotifificationStatus',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'uti_utilsateur_id');
    }
    public function taskFromUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'createdBy_id');
    }

    public function cataches()
    {
        return $this->belongsTo(Catache::class, 'catache_id');
    }
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function vehicules()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }
    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function images()
    {
        return $this->hasMany(Imgtache::class);
    }
}