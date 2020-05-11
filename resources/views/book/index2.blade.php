@extends('layouts.master')
@section('meta')
    <title>Danh sách cuốn sách</title>
@endsection
@push('css')
    <style>
        body{
            background: rgb(231, 235, 232);
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="GET" class="form-inline" role="form">

                <div class="form-group">
                    <label class="sr-only" for="">Keyword</label>
                    <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword') }}" id="" placeholder="Input field">
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <div>
                @include('partials.modal')
            </div>
<br>
            <div>
                <a href="{{ route('book.create') }}" class="btn btn-primary">Add new Book</a>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{  $book->author ? $book->author->name : '' }}</td>
                            <td>
                                @foreach ($book->categories as $category)
                                    <span class="label label-success">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $book->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('book.destroy', ['id' => $book->id]) }}" class="btn btn-danger btn-delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $books->appends($_GET) }}
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.btn-delete').click(function (event){
            let isDelete = confirm('Do you want to delete this book ?');
            if (!isDelete) {
                event.preventDefault();
            }
        })
    });
</script>

@endsection

