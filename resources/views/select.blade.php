@extends('src/footer')
<style>
    .box {
        height: 50px;
    }
</style>
<script>
    var dragged;
    var raiseIdElement = new Map();
    var data = new Map();
    var dropIdElement = new Map();

    /* события срабатывают для перетаскиваемой цели */
    document.addEventListener("drag", function (event) {

    }, false);

    document.addEventListener("dragstart", function (event) {
        // сохраняем исх. на перетаскиваемом элементе
        dragged = event.target;
        raiseIdElement = event.target.id.split(' ');
        console.log(raiseIdElement)
        // делаем полупрозрачным
        event.target.style.opacity = .5;
    }, false);

    document.addEventListener("dragend", function (event) {
        // сбросить прозрачность
        event.target.style.opacity = "";
    }, false);

    /* события, запущенные на цели падения */
    document.addEventListener("dragover", function (event) {
        // запретить по умолчанию разрешить падение
        event.preventDefault();
    }, false);

    document.addEventListener("dragenter", function (event) {
        dropIdElement = event.target.id.split(' ');
        // выделить потенциальную цель перетаскивания, когда перетаскиваемый элемент входит в нее
        if (event.target.className == "dropzone") {
            event.target.style.background = "purple";
        }
    }, false);

    document.addEventListener("dragleave", function (event) {
        // сбросить фон потенциальной цели падения, когда перетаскиваемый элемент покидает ее
        if (event.target.className == "dropzone") {
            event.target.style.background = "";
        }
    }, false);

    document.addEventListener("drop", function (event) {
        // предотвратить действие по умолчанию (открыть как ссылку для некоторых элементов)
        event.preventDefault();
        // переместить перетаскиваемый элемент в выбранную цель перетаскивания
        console.log(dropIdElement);
        console.log(data.size);
        if (data.size === 0) {
            if (dropIdElement[1] === raiseIdElement[1]) {
                data.set(raiseIdElement[1], +dropIdElement[0] + +raiseIdElement[0])
                dragged.parentNode.removeChild(dragged);
            }
        } else {
            data.set(raiseIdElement[1], +raiseIdElement[0] + +data.get(raiseIdElement[1]));
            dragged.parentNode.removeChild(dragged);
        }
        console.log(data);
    }, false);
</script>
<div class="dropzone mb-6" id="div1">
    <p id="{{$durrations[3] . ' ' . $projectName[3]}}" draggable="true">{{$projectName[3]}}</p>
    <p id="{{$durrations[0] . ' ' . $projectName[0]}}" draggable="true">{{$projectName[0]}}</p>
    <p id="{{$durrations[1] . ' ' . $projectName[1]}}" draggable="true">{{$projectName[1]}}</p>
    <p id="{{$durrations[2] . ' ' . $projectName[2]}}" draggable="true">{{$projectName[2]}}</p>
</div>
@section('content')
    <div class="container">
        @php($j = 0)
        @for($i = 0; $i < count($projectName); $i++)
            @break($j === count($projectName) - 1)
            <div class="columns is-multiline">
                <div draggable="true" class="box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input type="checkbox">
                            <p class="ml-2 subtitle is-5">
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
                <div draggable="true" class="ml-5 mr-5 box column level-item has-text-centered">
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
                <div draggable="true" class="box column level-item has-text-centered" >
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
