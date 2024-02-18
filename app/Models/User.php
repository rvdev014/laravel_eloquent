<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 *
 * @property Country $country
 * @property Post[] $posts
 * @property Comment[] $comments
 */
class User extends Authenticatable implements Searchable
{
  use HasApiTokens, HasFactory, Notifiable;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];
  
  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];
  
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];
  
  public function country(): BelongsTo
  {
    return $this->belongsTo(Country::class);
  }
  
  public function posts(): HasMany
  {
    return $this->hasMany(Post::class);
  }
  
  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class);
  }
  
  public function getSearchResult(): SearchResult
  {
    $url = route('user.show', $this->id);
    
    return new SearchResult(
      $this,
      $this->name,
      $url
    );
  }
}
