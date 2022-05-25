<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;
	    protected $fillable = [
        'title_fr', 
		'title_en', 
        'file',
        'user_id'
    ];

    public function forumHasUser() {
        return $this->hasOne('\App\Models\User', 'id', 'user_id');
    }
}
