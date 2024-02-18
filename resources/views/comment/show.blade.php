@php

use App\Models\Comment;
/** @var Comment $comment */

@endphp

<h1>Comment of: {{ $comment->user->name }}</h1>
<p>{{ $comment->content }}</p>
<p>{{ $comment->created_at }}</p>