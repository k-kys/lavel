
@extends('layouts.master')
@section('meta')
    <title>Đăng nhập</title>
@endsection
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="" method="POST" role="form">
					<legend>Login</legend>
					@csrf

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" id="" placeholder="Input field">
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" id="" placeholder="Input field">
					</div>

					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>

@endsection
