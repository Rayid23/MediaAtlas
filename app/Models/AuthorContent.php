<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorContent extends Model
{
    protected $table = 'author_content';

    protected $fillable = [
        'author_id',
        'content_id',
        'created_at',
        'updated_at'
    ];

    public function content(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }
}
