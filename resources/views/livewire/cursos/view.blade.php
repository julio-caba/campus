@role('admin')
@section('title', __('Cursos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Curso Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Cursos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Cursos
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.cursos.create')
						@include('livewire.cursos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>Imagen</th>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th>Profesor</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($cursos as $row)
							<tr>
								<td>
								<img class="img-fluid" src="storage/{{ $row->imagen }}" alt=""  width="100">
								<br>
								<a href="storage/{{ $row->imagen }}" target="_blank">ver</a>
								</td>
								<td>{{ $row->titulo }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>{{ $row->profesor }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Curso id {{$row->id}}? \nDeleted Cursos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $cursos->links() }}
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
@endrole
@role('alumno')
<!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">		
        <div class="section-header">
          <h2>Mis Cursos</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>
        <!-- blog posts list -->
        <div class="row gy-4 posts-list">
        {{-- aca iria el foreach --}}
		@foreach($cursos as $row)
          <div class="col-xl-4 col-md-6">
            <article>
            {{-- img descripcion --}}
              <div class="post-img">              
                <img src="storage/{{ $row->imagen }}" alt="" class="img-fluid">
              </div>
              {{-- titulo --}}
              <p class="post-category">{{ $row->titulo }}</p>
              {{-- breve descripcion --}}
              <h2 class="title">
                <a href="#">{{ $row->descripcion }}</a>
              </h2>
              {{-- profesor --}}
              <div class="d-flex align-items-center">                
                <div class="post-meta">
				<label>Profesor:</label>
                  <p class="post-author-list">{{ $row->profesor }}</p>
                  {{-- timestamp --}}
                  <p class="post-date">
                    {{-- <time datetime="2022-01-01">Jan 1, 2022</time> --}}
					<time datetime="{{ $row->created_at }}">{{ $row->created_at }}</time>
                  </p>
                </div>
              </div>
            </article>
          </div>
		  @endforeach
        </div>
        <!-- End blog posts list -->
      </div>
    </section>
  <!-- End Blog Section -->
@endrole
@role('profesor')
<!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Cursos</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>
		<!-- Service Item -->          
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
		  <!-- End Service Item -->          
        </div>
      </div>
    </section>
<!-- End Our Services Section -->
@endrole