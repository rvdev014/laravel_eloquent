@php

use App\Models\Post;
/** @var Post $post */

@endphp

<h1>{{ $post->title  }}</h1>
<b>{{ $post->user->name }}</b>
<p>{{ $post->content }}</p>

<h3>Comments:</h3>
@foreach($post->comments as $comment)
    <p>{{ $comment->content }}</p>
    <b>{{ $comment->user->name }}</b>
    <p>{{ $comment->created_at }}</p>
    <hr>
@endforeach