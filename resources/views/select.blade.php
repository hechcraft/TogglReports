@extends('src/footer')
@section('content')
    <div class="container">
        @for($i = 0; $i < 6; $i++)
            <div class="columns is-multiline">
                <div class="box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5"> Call of Duty </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
                <div class="ml-5 mr-5 box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5"> Call of Duty </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
                <div class="box column level-item has-text-centered" style="height: 48px;">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5"> Call of Duty </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
            </div>
        @endfor
        <div class="columns level mb-3">
            <div class="column level-item has-text-centered">
                <button class="button is-link is-medium">Next</button>
            </div>
        </div>
    </div>
@endsection
@extends('src/navbar')
