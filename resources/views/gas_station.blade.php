@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Gas Station</div>
				<div class="panel-body">
					<form class="form-horizontal" action="" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Cep</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="cep">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Address</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="address">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Number</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="number">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Map</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="maps_google">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">User</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="user_id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="state_id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="city_id">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary">
								Save
							</button></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
