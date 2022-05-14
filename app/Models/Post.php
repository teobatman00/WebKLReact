<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory, Uuids;


    public function tag() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function meta(): HasMany
    {
        return $this->hasMany(PostMeta::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
