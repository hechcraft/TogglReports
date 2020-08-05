
@extends('src/footer')
@section('content')
    <div class="container">
        <div class="control columns">
            <input class="mr-6 ml-3 column input is-focused" type="text" placeholder="From">
            <input class="ml-6 mr-3 column input is-focused" type="text" placeholder="To">
        </div>
        <div class="control">
            <input type="text" placeholder="API Token" class="input is-focused">
        </div>
        <div class="level has-text-centered column">
            <button class="button is-link is-medium"> Next </button>
        </div>
    </div>
@endsection
@extends('src/navbar')
