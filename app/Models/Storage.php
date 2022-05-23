<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Storage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Storage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storage query()
 * @mixin \Eloquent
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $file_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storage whereUrl($value)
 */
class Storage extends Model
{
    use HasFactory;
    use Uuids;
}
