<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'td_files';

    protected $fillable = [
        'file_location',
        'code',
        'title',
    ];
}
