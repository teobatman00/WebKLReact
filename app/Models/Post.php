<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelFillableRelations\Eloquent\Concerns\HasFillableRelations;

/**
 * App\Models\Post
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @mixin \Eloquent
 * @property string $id
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property string $slugs
 * @property string $image_url
 * @property int $published
 * @property string $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostMeta[] $post_metas
 * @property-read int|null $post_metas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlugs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
class Post extends Model
{
    use HasFactory;
    use Uuids;
    use HasFillableRelations;

    protected $table = 'posts';

    protected $fillable = [
       'title',
       'excerpt',
        'content',
        'slugs',
        'image_url',
        'published',
        'published_at'
    ];

    protected array $fillable_relations = [
        'tags',
        'categories',
        'post_metas',
        'comments'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "tag_post")->withTimestamps();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            table: 'category_post',
            foreignPivotKey: 'post_id',
            relatedPivotKey: 'category_id'
        )->withTimestamps();
    }

    public function post_metas(): HasMany
    {
        return $this->hasMany(PostMeta::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
