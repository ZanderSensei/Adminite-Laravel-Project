<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;
    protected $table="clases";
    protected $fillable=[
        'clas_name',
        'clas_stream',
        'clas_capacity',
        'clas_rep',
        'clas_teacher',
    ];
}
