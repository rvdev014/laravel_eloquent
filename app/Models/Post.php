<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Post
 *
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property string $published_at
 * @property int $user_id
 * @property string $created_at
 *
 * @property User $user
 * @property Comment[] $comments
 * @mixin Builder
 */
class Post extends Model implements Searchable
{
  // Package: michaeldyrynda/laravel-cascade-soft-deletes
  use HasFactory, SoftDeletes, CascadeSoftDeletes;
  
  protected $table = 'posts';
  
  protected $cascadeDeletes = ['comments'];
  
  protected $fillable = [
    'title',
    'content',
    'slug',
    'published_at',
    'user_id',
  ];
  
  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class);
  }
  
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  
  public function getSearchResult(): SearchResult
  {
    $url = route('post.show', $this->id);
    
    return new SearchResult(
      $this,
      $this->title,
      $url
    );
  }
}
