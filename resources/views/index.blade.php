@extends('layouts.main')
@section('content')
    <div class="container">
        <h1 style="text-align: center">Authors</h1></div>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"><h4>Authors</h4></th>
                <th scope="col"><h4>Books</h4></th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td><h6>{{$author->first_name . ' ' . $author->last_name}}</h6></td>
                    <td>@foreach($author->books as $book){{$book->title}}<br>@endforeach</td>
                </tr>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
