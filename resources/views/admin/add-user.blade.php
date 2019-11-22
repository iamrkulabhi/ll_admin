@extends('admin.main-layout')

@section('meta-title', 'Add User')

@section('view-style')

@endsection

@section('body-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if(session()->has('success'))
        	<div class="alert alert-success">
				{{session()->get('success')}}
			</div>
			@endif
        	<div class="panel panel-default" style="padding: 30px;">
        		<!-- <div class="panel-heading">
        			Add User
        		</div> -->
        		<div class="panel-body">
        			<div class="row">
        				<form method="POST" action="{{ route('adding-user') }}">
        					@csrf
        					<div class="form-group">
        						<label for="name">Name</label>
        						<input type="text" class="form-control @if($errors->has('name')) has-error @endif" id="name" placeholder="Email" name="name"/>
        						@if($errors->has('name'))
                                    <span class="help-inline">{{ $errors->first('name') }}</span>
                                @endif
        					</div>
        					<div class="form-group">
        						<label for="email">Email</label>
        						<input type="email" class="form-control @if($errors->has('email')) has-error @endif" id="email" placeholder="Email" name="email"/>
        						@if($errors->has('email'))
                                    <span class="help-inline">{{ $errors->first('email') }}</span>
                                @endif
        					</div>
        					<div class="form-group">
        						<label for="password">Password</label>
        						<input type="password" class="form-control @if($errors->has('password')) has-error @endif" id="password" placeholder="Password" name="password"/>
        						@if($errors->has('password'))
                                    <span class="help-inline">{{ $errors->first('password') }}</span>
                                @enderror
        					</div>
        					<div class="form-group">
        						<label for="password-confirm">Confirm Password</label>
        						<input id="password-confirm" type="password" class="form-control" name="password_confirmation"/>
        					</div>

        					<div class="form-group">
        						<button type="submit" class="btn btn-primary">Add User</button>
        					</div>
        				</form>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection

@section('view-script')

@endsection
