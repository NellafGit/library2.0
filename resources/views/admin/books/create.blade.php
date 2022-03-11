@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('book.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control mt-1" id="title" placeholder="Title">
            </div>
            <div class="form-group mt-2">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control mt-1" id="year" placeholder="Year">
            </div>
            <div class="form-group mt-2">
                <label for="author">Choose author</label>
                <select name="authors[]" id="authors" class="form-control" multiple>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name . ' ' . $author->surname}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
