@section('title', __('Roles'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Usersrole Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Usersroles">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Roles
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.usersroles.create')
						@include('livewire.usersroles.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<th>Nombre</th>
								<th>Rol</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $row)
							<tr>
								<td>{{ $row->name }}</td>								
								<td>
								@php 
										$names = DB::table('roles')													
													->where(['id' => ($row->role_id)])
													->select('name')
													->get();	
									@endphp		
									@foreach ($names as $name)
										{{$name->name}}	
									@endforeach								
								</td>								
								<td width="90">
								<div class="btn-group">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->role_id}})"><i class="fa fa-edit"></i> Edit </a>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
