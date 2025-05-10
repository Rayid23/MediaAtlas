<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorsFactory> */
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'url',
    ];

    public function contents(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Content::class, 'author_content', 'author_id', 'content_id');
    }
}
