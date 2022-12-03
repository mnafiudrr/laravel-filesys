<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'td_characters';

    protected $fillable = [
        'name',
    ];

    public function files(){
        return $this->belongsToMany(File::class, FileCharacter::class, 'character_id', 'file_id');
    }
}
