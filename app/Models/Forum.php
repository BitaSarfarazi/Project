<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr', 
        'content_fr',
        'title_en', 
        'content_en',
        'etudiant_id'
    ];

    public function forumHasUser() {
        return $this->hasOne('\App\Models\Etudiant', 'id', 'etudiant_id');
    }
}
