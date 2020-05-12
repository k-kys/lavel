@extends('layouts.master')
@section('meta')
    <title>Create product</title>
@endsection
@section('content')

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

@endsection
