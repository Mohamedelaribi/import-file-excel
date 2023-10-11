<?php

namespace App\Models;

use App\Models\Tache;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_id',
        'matricule',
    ];

    public function clients(){
        return $this->belongsTo(Client::class,'client_id', 'id');
    }

    // public function utilisateur(){
    //     return $this->belongsToMany(Utilisateur::class,'tache','vehicule_id', 'utilsateur_id');
    // }

    public function articles(){
        return $this->belongsToMany(Article::class,'article_vehicule', 'vehicule_id','article_id');
    }

    public function taches(){
        return $this->hasMany(Tache::class);
    }
}
