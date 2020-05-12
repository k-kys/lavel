@extends('layouts.master')
@section('meta')
    <title>Product</title>
@endsection
@section('content')

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
@endsection
