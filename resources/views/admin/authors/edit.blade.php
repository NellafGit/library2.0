@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('author.update', $author->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control mt-1" id="first-name" placeholder="Name"
                       value="{{$author->name}}">
            </div>
            <div class="form-group mt-2">
                <label for="surname">Surname</label>
                <input type="text" name="surname" class="form-control mt-1" id="last-name" placeholder="Surname"
                       value="{{$author->surname}}">
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
