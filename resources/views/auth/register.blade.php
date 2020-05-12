@extends('layouts.master')
@section('meta')
    <title>Đăng ký</title>
@endsection
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="{{ route('register') }}" method="POST" role="form">
					<legend>Register</legend>
@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" name="name" id="" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" id="" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" id="" placeholder="Input field">
					</div>

					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>

@endsection
