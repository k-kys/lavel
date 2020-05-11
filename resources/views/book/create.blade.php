@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form action="{{ Route('book.store') }}" method="POST" role="form">
                @csrf
                <legend>Create new book</legend>

                {{ Auth::id() }}

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Publish at</label>
                    <input type="date" class="form-control" name="publish_at" id="" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Categories</label>
                    <select name="categories[]" id="input" class="form-control select2" multiple required="required">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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


