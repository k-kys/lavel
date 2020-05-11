<!doctype html>
<html lang="en">
<head>
    <title>Edit product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
      <div class="container">
          <div class="row">
            <div class="col-md-6">
                
                <form action="{{ Route('product.update', ['id' => $product->id]) }}" method="POST" role="form">
                  {{ method_field('PUT') }}
                  <legend>Edit product id={{ $product->id }}</legend>
                    @csrf
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}" placeholder="Input field">
                    </div>

                    <div class="form-group">
                      <label for="">Description</label>
                    <textarea name="description" id="" class="md-textarea form-control" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="">Current_price</label>
                    <input type="number" class="form-control" name="current_price" id="" value="{{ $product->current_price }}" placeholder="Input field">
                    </div>

                    <div class="form-group">
                      <label for="">Category_id</label>
                    <input type="number" class="form-control" name="category_id" id="" value="{{ $product->category_id }}" placeholder="Input field">
                    </div>
                
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
            </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
