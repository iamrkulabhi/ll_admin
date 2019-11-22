@extends('admin.main-layout')

@section('meta-title', 'Show User')

@section('view-style')
<!-- DataTables CSS -->
<link href="{{ asset('css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ asset('css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('body-content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Show User</h1>
		</div>
	</div>
	<div class="row">
		@if(session()->has('success'))
    	<div class="alert alert-success">
			{{session()->get('success')}}
		</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading">
				All users
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($users as $user)
	                        <tr>
	                            <td>{{$user->id}}</td>
	                            <td>{{$user->name}}</td>
	                            <td>{{$user->email}}</td>
	                            <td>
	                            	<ul class="action-items">
	                            		<li class="action-each-item">
	                            			<a href="{{ route('edit-user', $user->id) }}">
	                            				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                            			</a>
	                            		</li>
	                            		<li class="action-each-item">
	                            			<a href="#" data-id="{{$user->id}}" data-path="{{ route('delete-user', $user->id) }}" data-toggle="modal" data-target="#deleteModal" class="open-delete-modal">
	                            				<i class="fa fa-trash-o" aria-hidden="true"></i>
	                            			</a>
	                            		</li>
	                            	</ul>
	                            </td>
	                        </tr>
	                        @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure?</h4>
			</div>
			<div class="modal-body">
				<p>If deleted then user will lost permanently. are you sure?</p>
			</div>
			<form action="" method="POST" class="delete_form" style="display: none;">
				@csrf
				<input type="hidden" name="id" value="" id="delete_form_id" />
				<input type="submit" name="Delete User"/>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" onclick="$('form.delete_form').submit();">Delete</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('view-script')
<!-- DataTables JavaScript -->
<script src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {

    	$(document).on('click', 'a.open-delete-modal', function(){
    		$('form.delete_form').attr('action', $(this).data('path'));
    		$('input#delete_form_id').val($(this).data('id'));
    		return true;
    	});
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
@endsection
