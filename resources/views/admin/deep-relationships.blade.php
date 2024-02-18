<?php

use App\Models\Country;

/** @var Country[] $countries */

?>

@foreach($countries as $country)
    <h3>Country: {{ $country->name }}</h3>

    There are {{ $country->users()->count() }} users for this country.

    There are {{ $country->posts()->count() }} posts for this country.

    There are {{ $country->comments()->count() }} comments for this country.
@endforeach