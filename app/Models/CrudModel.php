<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    use HasFactory;

    protected $table='crud_models';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name','email','password','gender'];
}   
