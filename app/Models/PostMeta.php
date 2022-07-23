<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PostMeta
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta query()
 * @mixin \Eloquent
 * @property string $id
 * @property string $key
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereValue($value)
 */
class PostMeta extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'post_metas';

    protected $fillable = [
      'key',
      'value'
    ];

    protected array $fillable_relations = [
        'post'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
