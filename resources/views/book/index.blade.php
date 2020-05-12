
@extends('layouts.master')
@section('meta')
    <title>Index đểu</title>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <legend>Book</legend>
            <a href="{{ route('book.create') }}">Add new book</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Publish at</th>
                        {{-- <th>Categories</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->publish_at }}</td>
                        {{-- <td>{{ $book->categories }}</td> --}}
                        <td>
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('book.destroy', ['id' => $book->id]) }}" class="btn btn-danger btn-delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.btn-delete').click(function (event){
            let isDelete = confirm('Do you want to delete this record ?');
            if (!isDelete) {
                event.preventDefault();
            }
        })
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

@endsection
