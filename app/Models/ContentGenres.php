<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentGenres extends Model
{
    protected $table = 'content_genres';

    protected $fillable = [
        'content_id',
        'genre_id',
        'created_at',
        'updated_at'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'content_id');
    }
    public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
