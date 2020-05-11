<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create product</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">

				@if ($errors->any())
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ Route('product.store') }}" method="POST" role="form">
					<legend>Create product</legend>
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" id="" value="{{old('name')}}" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Description</label>
					<textarea name="description" id="" class="md-textarea form-control" rows="3">{{ old('description') }}</textarea>
					</div>

					<div class="form-group">
						<label for="">Current_price</label>
					<input type="number" class="form-control" name="current_price" id="" value="{{ old('current_price') }}" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Category_id</label>
					<input type="number" class="form-control" name="category_id" id="" value="{{ old('category_id') }}" placeholder="Input field">
					</div>

					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
