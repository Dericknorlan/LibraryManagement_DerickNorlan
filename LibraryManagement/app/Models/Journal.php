<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    /**
     * Fillable attributes for the journal model
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'publish_date',
        'abstract',
    ];
}
