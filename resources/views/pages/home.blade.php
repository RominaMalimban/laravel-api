@extends('layouts.main-layout')

@section('content')

    <div class="container">
        <h1>Movie List</h1>
        <h2>
            <a href="{{ route('movieCreate') }}">Insert a new movie</a>
        </h2>
        <ul>
            @foreach ($genres as $genre)

                <li>
                    <h2>Genre: {{$genre -> name}}</h2>
                </li>

                <ol>
                    @foreach ($genre -> movies as $movie)
                        <li>
                            <div><strong>Title:</strong> {{$movie-> name}}</div>
                            <div><strong>Year:</strong> {{$movie-> year}}</div>
                            <div><strong>Cash Out:</strong>  {{$movie-> cashOut}}&dollar;</div> 

                            <a href="{{route('deleteMovie', $movie)}}">DELETE</a>
                            <a href="#">EDIT</a>
                        </li>
                    @endforeach
                </ol>
            @endforeach
        </ul>
    </div>
    
@endsection