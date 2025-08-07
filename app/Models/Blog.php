<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];


    function comments(): HasMany
    {

        return $this->hasMany(Comment::class);
    }

    function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    function ratings(): MorphMany
    {

        return $this->morphMany(Rating::class, 'ratingable');
    }

    function user(): BelongsTo
    {

        return $this->belongsTo(User::class, 'author_id');
    }
}
