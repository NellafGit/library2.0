@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('book.update', $book->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control mt-1" id="title" placeholder="Title"
                       value="{{$book->title}}">
            </div>
            <div class="form-group mt-2">
                <label for="year">Year</label>
                <input type="number" name="year" class="form-control mt-1" id="year" placeholder="Year"
                       value="{{$book->year}}">
            </div>
            <div class="form-group mt-2">
                <label for="author">Choosen author</label>
                {{ Form::select(
                    'authors',$author_list,
                    $choosen_authors ,
                    array('multiple' => 'multiple',
                    'name' => 'authors[]',
                    'id' => 'authors',
                    'class' => "form-control"))
}}
            </div>
            <div>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </td>
                </tr>
            </div>
        </form>
    </div>
@endsection
