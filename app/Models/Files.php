<?php

namespace App\Models;

use Database\Factories\FilesFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Files
 *
 * @property int $id
 * @property string $file_name
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static FilesFactory factory(...$parameters)
 * @method static Builder|Files newModelQuery()
 * @method static Builder|Files newQuery()
 * @method static Builder|Files query()
 * @method static Builder|Files whereCategoryId($value)
 * @method static Builder|Files whereCreatedAt($value)
 * @method static Builder|Files whereFileName($value)
 * @method static Builder|Files whereId($value)
 * @method static Builder|Files whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Files extends Model
{
    use HasFactory;
}
