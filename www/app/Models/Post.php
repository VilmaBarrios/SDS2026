<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'date',
        'content',
        'authors',
        'image',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
{
    return $this->hasMany(PostImage::class);
}

    public function scopePublicados($query)
    {
        return $query->where('status', 'publicado');
    }
    public function urlImagen(): ?string
{
    if (! $this->image) {
        return null;
    }

    return str_starts_with($this->image, 'img/')
        ? asset($this->image)
        : asset('storage/' . $this->image);
}
}