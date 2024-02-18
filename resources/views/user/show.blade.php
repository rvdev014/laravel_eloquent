@php

use App\Models\User;
/** @var User $user */

@endphp

<h1>{{ $user->name  }}</h1>
<p>{{ $user->email }}</p>
<p>{{ $user->created_at }}</p>