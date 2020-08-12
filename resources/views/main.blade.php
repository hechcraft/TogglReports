@extends('src/footer')
@section('content')
    <form action="submit" method="POST">
        @csrf
        <div class="container">
            <div class="control columns">
                <input name="From" class="mr-6 ml-3 column input is-focused" type="text" placeholder="From"
                       value="2020-08-01">
                <input name="To" class="ml-6 mr-3 column input is-focused" type="text" placeholder="To"
                       value="2020-08-13">
            </div>
            <div class="mt-2 control columns">
                <input name="API" type="text" placeholder="API Token" class="ml-3 mr-4 input is-10 column is-focused"
                       value="6945021eae60daf4d24d2fb730a80e80">
                <label class="checkbox column">
                    <input name='checkbox' type="checkbox">
                    Checkbox
                </label>
            </div>
            <div class="level has-text-centered column">
                <button type="submit" class="button is-link is-medium"> Next</button>
            </div>
        </div>
    </form>
@endsection
@extends('src/navbar')
