@extends('layouts.admin')
@section('content')
    <div class="container">
        <form action="{{route('author.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="first_name">Name</label>
                <input type="text" name="name" class="form-control mt-1" id="name" placeholder="Name">
            </div>
            <div class="form-group mt-2">
                <label for="surname">Surname</label>
                <input type="text" name="surname" class="form-control mt-1" id="surname" placeholder="Surname">
            </div>
            <div>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </td>
                </tr>
            </div>
        </form>
    </div>
@endsection
