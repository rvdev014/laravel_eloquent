<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */
class PostResource extends JsonResource
{
  public static $wrap = null;
  
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
      'content' => $this->content,
      'slug' => $this->slug,
      'published_at' => $this->published_at,
      'user_id' => $this->user_id,
      'created_at' => $this->created_at,
      'comments' => $this->whenLoaded('comments'),
    ];
  }
}
