@extends('src/footer')
<script>
    var test = '';
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        test += ev.dataTransfer.getData("text");
        alert(test);
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" style="height: 100px; width: 100px"></div>

<div class="container">
    <p id="{{$durrations[0]}}" ondragstart="drag(event)" draggable="true"> {{ $projectName[0] }}</p>
    <p id="{{$durrations[1]}}" ondragstart="drag(event)" draggable="true"> {{ $projectName[1] }}</p>
</div>

@section('content')
    <div class="container">
        @php($j = 0)
        @for($i = 0; $i < count($projectName); $i++)
            @break($j === count($projectName) - 1)
            <div class="columns is-multiline">
                <div class="box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p draggable="true" class="ml-2 subtitle is-5">
                                @if($j != 0)
                                    {{$projectName[++$j]}}
                                @else
                                    {{$projectName[$j]}}
                                @endif
                            </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
                @break($j === count($projectName) - 1)
                <div class="ml-5 mr-5 box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5">
                                {{$projectName[++$j]}}
                            </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
                @break($j === count($projectName) - 1)
                <div class="box column level-item has-text-centered" style="height: 50px;">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5">
                                {{$projectName[++$j]}}
                            </p>
                        </label>
                        <p class="level-right"> move </p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <div class="container">
        <div class="columns mb-3">
            <div class="column has-text-centered">
                <button class="button is-link is-medium">Next</button>
            </div>
        </div>
    </div>
@endsection
@extends('src/navbar')
