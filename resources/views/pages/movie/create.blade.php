@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <h1>Insert a new movie</h1>

        @include('components.error')

        <form method="POST" action="{{ route('storeMovie') }}">
        @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Enter a movie title</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Enter the year of the movie</label>
                <input type="number" class="form-control" name="year">
            </div>
            <div class="mb-3">
                <label for="cashOut" class="form-label">Enter the cash out</label>
                <input type="number" class="form-control" name="cashOut">
              </div>
            <input type="submit" class="btn btn-danger" value="Insert new movie">
          </form>
    </div>
@endsection