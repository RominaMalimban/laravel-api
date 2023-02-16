@extends('layouts.main-layout')

@section('content')

    <div class="container">
        <h1>Update the movie: {{$movie -> name}}</h1>

        <form method="POST" action="{{ route('updateMovie', $movie) }}">
            @csrf
            <div class="mb-3">
            <label for="name" class="form-label">Enter a movie title</label>
            <input type="text" class="form-control" name="name" value="{{$movie-> name}}">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Enter the year of the movie</label>
                <input type="number" class="form-control" name="year" value="{{$movie-> year}}">
            </div>
            <div class="mb-3">
                <label for="cashOut" class="form-label">Enter the cash out</label>
                <input type="number" class="form-control" name="cashOut" value="{{$movie-> cashOut}}">
            </div>

            {{-- select per Genre (rapporto 1toM) --}}
            <div class="mb-3">
                <label for="genre_id" class="form-label">Select a Genre</label>
                <select name="genre_id">
                    @foreach ($genres as $genre)
                        <option value="{{$genre -> id}}"
                            @if($movie -> genre -> id === $genre -> id){
                                selected
                                }
                                >s{{$genre -> name}}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            
            {{-- checkbox per Tag (rapporto MtoM) --}}
            <div class="mb-3">
                <span>Select a Tag:</span>
                <div class="form-check">
                    @foreach ($tags as $tag)
                        <div>
                            <label class="form-check-label" for="tags">{{$tag -> name}}</label>
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach ($movie -> tags as $tagMovie)
                                    @if ($tagMovie -> id === $tag -> id)
                                        checked> 
                                    @endif
                                @endforeach
                          
                        </div>
                    @endforeach
                    
                </div>
            </div>
            
            <input type="submit" class="btn btn-danger" value="Update movie">
        </form>
    </div>
    
@endsection