<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property-read User[] $users
 * @property-read Post[] $posts
 * @property-read Comment[] $comments
 
 * @mixin Builder
 */
class Country extends Model
{
    use HasFactory, HasRelationships;
    
    protected $table = 'countries';
    
    protected $fillable = [
        'name',
        'code'
    ];
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
    
    public function comments(): HasManyDeep
    {
      // Package: staudenmeir/eloquent-has-many-deep
        return $this->hasManyDeep(Comment::class, [User::class, Post::class]);
    }
}
