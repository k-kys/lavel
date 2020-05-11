<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<legend>Product</legend>
				<a href="{{ Route('product.create') }}" class="btn btn-primary">Add new product</a>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Tên sản phẩm</th>
							<th>Mô tả</th>
							<th>Giá</th>
							<th>Category_id</th>
							<th>Ngày tạo</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->current_price }}</td>
								<td>{{ $product->category_id }}</td>
								<td>{{ $product->created_at }}</td>
								<td>
								<a href="{{ Route('product.edit', ['id' => $product->id]) }}" class="btn bg-primary" >Edit</a>
								<a href="{{ Route('product.destroy', ['id' => $product->id]) }}" class="btn bg-danger btn-delete"> Delete </a>
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
			$('.btn-delete').click(function (event) {
				let isDelete = confirm('Bạn có muốn xóa bản ghi này hay không');
				if (!isDelete) {
					event.preventDefault();
				}
			})
		})
	</script>
</body>
</html>
