<?php

namespace App\Models\Camera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CameraImage extends Model
{
    use HasFactory;
    protected $table = 'td_camera_images';
    protected $fillable = [
        'name',
        'path',
        'url',
        'type',
        'size',
        'extension',
        'mime',
        'width',
        'height',
    ];
}
