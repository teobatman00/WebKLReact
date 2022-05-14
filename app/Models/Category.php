<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Category
 *
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory, Uuids;
   
    public function post() : BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, "parent_id")->with('parent');
    }

    public function parent(): HasMany
    {
        return $this->hasMany(Category::class, "parent_id");
    }

}
