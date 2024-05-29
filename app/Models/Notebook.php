<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $table = 'notebooks';

    protected $fillable = [
        'full_name',
        'company',
        'phone',
        'email',
        'date_of_birth',
        'photo_url',
    ];
}
