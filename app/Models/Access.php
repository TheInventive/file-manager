<?php

namespace App\Models;

use Database\Factories\AccessFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Access
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static AccessFactory factory(...$parameters)
 * @method static Builder|Access newModelQuery()
 * @method static Builder|Access newQuery()
 * @method static Builder|Access query()
 * @method static Builder|Access whereCategoryId($value)
 * @method static Builder|Access whereCreatedAt($value)
 * @method static Builder|Access whereId($value)
 * @method static Builder|Access whereType($value)
 * @method static Builder|Access whereUpdatedAt($value)
 * @method static Builder|Access whereUserId($value)
 * @mixin Eloquent
 */
class Access extends Model
{
    use HasFactory;
}
