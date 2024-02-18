<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): Collection|array
  {
    return QueryBuilder::for(Post::class)
      ->allowedFilters(['title', 'content'])
      ->get();
  }
  
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }
  
  /**
   * Display the specified resource.
   */
  public function show(Post $post): PostResource
  {
    return PostResource::make($post->load('comments'));
  }
  
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    //
  }
  
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post): void
  {
    $post->delete();
  }
}
