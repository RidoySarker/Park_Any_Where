@extends('admin.layouts.backend_main')
@section('title') Profile | PAW @endsection
@section('content')
<div class="main-content">
	<div class="data-table-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0 font-18">Profile</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 box-margin height-card">
				<div class="card card-body">
					<h4 class="card-title"></h4>
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<form id="addProfile" method="post">
								@csrf
								<h4 class="card-title"><b> Welcome {{Auth::user()->gender==1?'Mr.' : 'Mrs.'}} {{Auth::user()->name}}</b></h4>

								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="First Name Here">
								</div>

								<div class="form-group">
									<label for="contact">Contact</label>
									<input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="{{Auth::user()->contact}}">
								</div>

								<div class="form-group">
									<label for="gender">Gender</label>
									<div class="col-md-9">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input gender" value="1" id="Male" name="gender" @if(Auth::user()->gender=='1') {{'checked'}} @endif>
											<label class="custom-control-label" for="Male">Male</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input gender" value="2" id="Female" name="gender" @if(Auth::user()->gender=='2') {{'checked'}} @endif>
											<label class="custom-control-label" for="Female">Female</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<div>
										<p>{{Auth::user()->email}}</p>
									</div>
								</div>

								<div class="form-group row">
									<label for="current_password">Current Password</label>
									<div class="col-sm-9">
										<input type="password" for="current_password" class="form-control" id="current_password" placeholder="Password Here">
										<span id="icon"></span>
									</div>
								</div>

								<div class="form-group row">
									<label for="new_password">New Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password Here" disabled>
									</div>
								</div>

								<div class="form-group row">
									<label for="retype_password">Retype Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="retype_password" name="retype_password" placeholder=" Retype New Password Here" disabled>
										<span id="re_icon"></span>
									</div>
								</div>
								<button type="submit" id="submit" class="btn btn-primary mr-2 mt-15">Submit</button>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	@endsection @section('script')
	<script src="ajax/profile.js"></script>
	@endsection