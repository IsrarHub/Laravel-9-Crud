<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCrudModel extends Model
{
    use HasFactory;


    protected $table='image_crud_models';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name','img_path'];

}
