@extends('layouts.admin')
@section('content')
    <div class="container">
        <h5 style="text-align: center">Authors</h5>
        <a class="btn btn-primary mt-3 mb-3" href="{{route('author.create')}}">Create</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col" style="width: 10%; text-align: center">Number of Books</th>
                <th scope="col" style="width: 10%; text-align: center">Edit</th>
                <th scope="col" style="width: 10%; text-align: center">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td>{{$author->name}}</td>
                    <td>{{$author->surname}}</td>
                    <td style="text-align: center">{{$author->books->count()}}</td>
                    <td style="text-align: center">
                        <a href="{{route('author.edit', $author->id)}}" class="btn btn-primary">Edit</button>
                    </td>
                    <td style="text-align: center">
                        <form action="{{route('author.delete', $author->id)}}" method="post">
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
