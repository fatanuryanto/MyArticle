<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'category_id',
        'img',
    ];

    public function tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
