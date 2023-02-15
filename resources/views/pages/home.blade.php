@extends('layouts.main-layout')

@section('content')

    <div class="container">
        <h1>Movie List</h1>

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
                        </li>
                    @endforeach
                </ol>
            @endforeach
        </ul>
    </div>
    
@endsection