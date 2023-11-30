<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'img',
    ];

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

}
