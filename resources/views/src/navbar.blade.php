@section('navbar')
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <div class="columns level">
            <div class="column level-item has-text-centered">
                <button class="button is-link is-medium">Step 1</button>
            </div>
            <div class="column level-item has-text-centered">
                <button class="button is-link is-medium">Step 2</button>
            </div>
            <div class="column level-item has-text-centered">
                <button class="button is-link is-medium">Step 3</button>
            </div>
        </div>
    </div>
    <div class="container mt-6">
        <h1 class="title">
            Toggl Guide
        </h1>
        <p class="subtitle"">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus aliquid architecto culpa facere
            libero, maiores neque nobis, officiis rerum sequi, similique veniam? Accusamus at beatae cum dolorum earum
            eligendi expedita, iste magni nam officiis pariatur provident quibusdam quod tenetur velit veritatis
            voluptatibus. Consectetur culpa dolorem ea, natus neque nulla repellat sapiente voluptatum. Adipisci alias
            aliquam, commodi deleniti dolores error esse eum harum in ipsa laudantium magnam modi quas reiciendis rem,
            sapiente voluptates. Commodi deleniti dignissimos enim, excepturi fugiat hic illo illum ipsa, ipsum iusto
            nam nulla optio porro quae saepe similique sit suscipit temporibus tenetur ut vel voluptas voluptates?
        </p>
    </div>
</section>
</div>
</section>
<div>
    @yield('content')
</div>
@show
