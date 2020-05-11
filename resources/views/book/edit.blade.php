<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<body>
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
</body>

</html>
