@extends('layouts.master')
@section('meta')
    <title>Sửa thông tin sách</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <form action="{{ route('book.update', compact('id')) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <legend>Edit book</legend>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $book->name }}" placeholder="Input field">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="" value="{{ $book->description }}" placeholder="Input field">
                    </div>

                    <div class="form-group">
                        <label for="">Publish at</label>
                        <input type="date" class="form-control" name="publish_at" id="" value="{{ $book->publish_at }}" placeholder="Input field">
                    </div>


                    <div class="form-group">
                        <label for="">Categories</label>
                        @php
                            $categoryIds = $book->categories->pluck('id')->toArray();
                        @endphp
                        <select name="categories[]" id="input" class="form-control select2" multiple required="required">
                            @foreach ($categories as $category)
                                <option {{ in_array($category->id, $categoryIds) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.select2').select2()
        });
    </script>
@endsection
