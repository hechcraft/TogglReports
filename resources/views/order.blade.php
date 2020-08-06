@extends('src/footer')
@section('content')
    <div class="container">
        <h1 class="title is-1"> Top 5 </h1>
        <div class="box columns mb-6">
            <div class="column has-text-centered">
                <figure class="image is-4by5">
                    <img
                        src="https://static.posters.cz/image/750/%D0%9F%D0%BB%D0%B0%D0%BA%D0%B0%D1%82/batman-arkham-knight-cover-i24451.jpg">
                </figure>
            </div>
            <div class="column has-text-centered">
                <figure class="image is-4by5">
                    <img
                        src="https://static.posters.cz/image/750/%D0%9F%D0%BB%D0%B0%D0%BA%D0%B0%D1%82/batman-arkham-knight-cover-i24451.jpg">
                </figure>
            </div>
            <div class="column has-text-centered">
                <figure class="image is-4by5">
                    <img
                        src="https://static.posters.cz/image/750/%D0%9F%D0%BB%D0%B0%D0%BA%D0%B0%D1%82/batman-arkham-knight-cover-i24451.jpg">
                </figure>
            </div>
            <div class="column has-text-centered">
                <figure class="image is-4by5">
                    <img
                        src="https://static.posters.cz/image/750/%D0%9F%D0%BB%D0%B0%D0%BA%D0%B0%D1%82/batman-arkham-knight-cover-i24451.jpg">
                </figure>
            </div>
            <div class="column has-text-centered">
                <figure class="image is-4by5">
                    <img
                        src="https://static.posters.cz/image/750/%D0%9F%D0%BB%D0%B0%D0%BA%D0%B0%D1%82/batman-arkham-knight-cover-i24451.jpg">
                </figure>
            </div>
        </div>
        @for($i = 0; $i < 4; $i++)
            <div class="columns">
                <div class="column box ml-6 mr-6">
                    <div class="level">
                        <p class="level-left"> Call of Duty </p>
                        <p class="level-right"> 45 </p>
                    </div>
                </div>
                <div class="column box ml-6 mr-6" style="height: 48px;">
                    <div class="level">
                        <p class="level-left"> Call of Duty </p>
                        <p class="level-right"> 45 </p>
                    </div>
                </div>
            </div>
    @endfor
        <div class="columns level mb-3">
            <div class="column level-item has-text-centered">
                <button class="button is-link is-medium">Download</button>
            </div>
        </div>
@endsection
@extends('src/navbar')
