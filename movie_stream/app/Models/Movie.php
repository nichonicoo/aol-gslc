<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{

    protected $fillable =  [
        'genres_id',
        'title',
        'photo',
        'publish_date',
        'description',
    ];

    public function genres() : BelongsTo {
        return $this->belongsTo(Genre::class);
    }
}
