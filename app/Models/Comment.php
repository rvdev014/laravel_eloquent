<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Comment
 * @package App\Models
 *
 * @property int $id
 * @property string $content
 * @property int $post_id
 * @property string $created_at
 *
 * @property Post $post
 * @property User $user
 *
 * @mixin Builder
 */
class Comment extends Model implements Searchable
{
  use HasFactory;
  
  protected $table = 'comments';
  
  protected $fillable = [
    'content',
    'post_id',
  ];
  
  public function post(): BelongsTo
  {
    return $this->belongsTo(Post::class);
  }
  
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  
  public function getSearchResult(): SearchResult
  {
    $url = route('comment.show', $this->id);
    
    return new SearchResult(
      $this,
      $this->content,
      $url
    );
  }
}
