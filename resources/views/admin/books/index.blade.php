@extends('layouts.admin')
@section('content')
    <div class="container">
        <h5 style="text-align: center">Books</h5>
        <a class="btn btn-primary mt-3 mb-3" href="{{route('book.create')}}">Create</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Authors</th>
                <th scope="col" style="width: 20%">Year</th>
                <th scope="col" style="width: 10%">Edit</th>
                <th scope="col" style="width: 10%">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>@foreach($book->authors as $item){{$item->name . ' ' . $item->surname}}<br>@endforeach
                    </td>
                    <td>{{$book->year}}</td>
                    <td>
                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('book.delete', $book->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
