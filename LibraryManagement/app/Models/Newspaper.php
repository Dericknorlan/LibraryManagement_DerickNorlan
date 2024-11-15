<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;

    /**
     * Fillable fields for a Newspaper.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'publisher',
        'publication_date',
        'is_available', // Updated to reflect the new column
    ];
}
