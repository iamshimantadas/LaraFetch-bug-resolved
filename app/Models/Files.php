<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $table="files";
    protected $primaryKey="id";

    // **Allow mass assignment for these fields**
    protected $fillable = [
        'topic', 
        'filename', 
        'date', 
        'time'
    ];
}
