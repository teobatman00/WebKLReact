<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Comment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasFactory, Uuids;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, "parent_id")->with('parent');
    }

    public function parent(): HasMany
    {
        return $this->hasMany(Comment::class, "parent_id");
    }

    
}
