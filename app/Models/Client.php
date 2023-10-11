<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tache;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomComplet',
        'email_client',
        'telephone_client',
    ];
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'client_id');
    }

    public function utilisateurs()
    {
        return $this->belongsToMany(User::class, 'client_utilisateur', 'client_id', 'utilsateur_id')->withPivot('besoin', 'date_besoin');
    }
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }


    protected $casts = [
        'created_at' => 'date:Y-m-d',

    ];
}