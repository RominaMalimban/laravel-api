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

                {{-- ciclo per stampare tags --}}
                <ul>
                    @foreach ($movie -> tags as $tag)
                        <li><strong>Tag's name:</strong> {{$tag -> name}}</li> 
                    @endforeach 
                </ul>
                
            </li>
        @endforeach
    </ol>
</div>

@endsection