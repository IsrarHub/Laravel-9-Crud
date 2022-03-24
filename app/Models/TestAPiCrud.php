<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class TestAPiCrud extends Model
{
    use HasFactory,HasApiTokens;
    protected $table='test_a_pi_cruds';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name','email','password'];
}
