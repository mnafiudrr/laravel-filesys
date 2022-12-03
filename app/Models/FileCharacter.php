<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCharacter extends Model
{
    use HasFactory;

    protected $table = 'td_file_characters';

    protected $fillable = [
        'file_id',
        'character_id',
    ];
}
