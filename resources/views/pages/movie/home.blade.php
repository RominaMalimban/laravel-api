@extends('layouts.main-layout')

@section('content')
<div class="container">
    <h1>Movies List</h1>
    <h2>
        <a href="{{ route('movieCreate') }}">Insert a new movie</a>
    </h2>
    <ol>
        @foreach ($movies as $movie)
            <li>
                <div><strong>Title:</strong> {{$movie-> name}}</div>
                <div><strong>Year:</strong> {{$movie-> year}}</div>
                <div><strong>Cash Out:</strong>  {{$movie-> cashOut}}&dollar;</div> 

                {{-- ciclo per stampare i tags: --}}
                <ul>
                    @foreach ($movie -> tags as $tag)
                        <li>
                            <strong>Tag name:</strong> {{$tag -> name}}
                        </li>
                @endforeach
                </ul>
            
                {{-- rotte per delete ed edit: --}}
                <a href="{{route('deleteMovie', $movie)}}">DELETE</a>
                <a href="{{route('editMovie', $movie)}}">EDIT</a>
            </li>
        @endforeach
    </ol>
</div>

@endsection