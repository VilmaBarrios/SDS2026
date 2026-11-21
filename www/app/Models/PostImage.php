<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
        'post_id',
        'path',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function url(): string
{
    return str_starts_with($this->path, 'img/')
        ? asset($this->path)
        : asset('storage/' . $this->path);
}
}