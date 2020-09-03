@extends('src/footer')
<style>
    .box {
        height: 50px;
    }
</style>
</script>
@section('content')
    <form method="post" action="/order">
        @csrf
    <div class="container">
        @php($j = 0)
        @for($i = 0; $i < count($projectName); $i++)
            @break($j === count($projectName) - 1)
            @if($j != 0)
                @php(++$j)
            @endif
            <div class="columns is-multiline">
                <div id="{{$durrations[$j] . ' ' . $projectName[$j]}}" draggable="true"
                     class="box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input checked name="selected[]" value="{{$durrations[$j] . ' ' . $projectName[$j]}}" type="checkbox">
                            <p class="ml-2 subtitle is-5">
                                {{$projectName[$j]}}
                            </p>
                        </label>
                    </div>
                </div>
                @break($j === count($projectName) - 1)
                @php(++$j)
                <div id="{{$durrations[$j] . ' '. $projectName[$j]}}" draggable="true"
                     class="ml-5 mr-5 box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input name="selected[]" value="{{$durrations[$j] . ' ' . $projectName[$j]}}"or type="checkbox">
                            <p class="ml-2 subtitle is-5">
                                {{$projectName[$j]}}
                            </p>
                        </label>
                    </div>
                </div>
                @break($j === count($projectName) - 1)
                @php(++$j)
                <div id="{{$durrations[$j] . ' ' . $projectName[$j]}}" draggable="true"
                     class="box column level-item has-text-centered">
                    <div class="level">
                        <label class="checkbox level-left">
                            <input name="selected[]" value="{{$durrations[$j] . ' ' . $projectName[$j]}}" type="checkbox">
                            <p class="ml-2 subtitle is-5">
                                {{$projectName[$j]}}
                            </p>
                        </label>
                    </div>
                </div>
            </div>
        @endfor
    </div>
        <div class="container">
            <div class="columns mb-3">
                <div class="column has-text-centered">
                    <button type="submit" class="button is-link is-medium">Next</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@extends('src/navbar')
