<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'porto';
    protected $fillable = [
        'file_url',
        'title',
        'description',
        'category_id',
    ];
}
