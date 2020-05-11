@extends('layouts.master')
@section('meta')
    <title>Danh sách cuốn sách</title>
@endsection
@push('css')
    <style>
        body{
            background: rgb(186, 206, 193);
        }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
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


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Create at</th>
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
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $books->appends($_GET) }}
        </div>
    </div>
</div>

@endsection

