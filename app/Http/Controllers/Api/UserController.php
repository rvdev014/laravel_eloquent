<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): Collection|array
  {
    // Package: spatie/laravel-query-builder
    return QueryBuilder::for(User::class)
      ->allowedFilters(['name', 'email'])
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
  public function show(User $user): User
  {
    return $user;
  }
  
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    //
  }
  
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
