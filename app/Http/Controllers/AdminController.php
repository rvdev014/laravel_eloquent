<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Country;
use Spatie\Searchable\Search;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
  public function search(): View
  {
    $search = request('q') ?? '';
    
    // Package: spatie/laravel-searchable
    $searchResults = (new Search())
      ->registerModel(User::class, 'name')
      ->registerModel(Post::class, 'title', 'content')
      ->registerModel(Comment::class, 'content')
      ->limitAspectResults(10)
      ->search($search);
    
    return view('admin.search', [
      'searchResults' => $searchResults
    ]);
  }
  
  public function deepRelationships(): View
  {
    $countries = Country::all();
    return view('admin.deep-relationships', [
      'countries' => $countries,
    ]);
  }
}
