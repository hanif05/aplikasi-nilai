@extends('layouts/Apps')



@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('berhasil'))
						<div class="alert alert-success" role="alert" >
							{{ session('berhasil') }}
						</div>

					@endif

					@if(session('error'))
						<div class="alert alert-danger" role="alert" >
							{{ session('error') }}
						</div>

					@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{ $data->getFoto() }}" class="img-circle" alt="Avatar" style="width: 120px; height: 120px;">
										<h3 class="name">{{ $data->nama }}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{ $data->matkul->count() }} <span>Mata Kuliah</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Siswa</h4>
										<ul class="list-unstyled list-justify">
											
											<li>No Telepon<span>{{ $data->telp }}</span></li>
											
											<li>Alamat <span>{{ $data->alamat }}</span></li>
										</ul>
									</div>
									<div class="profile-info">
										
									</div>
									<div class="text-center"><a href="/siswa/{{$data->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								
								<!-- TABBED CONTENT -->
								<!-- TABLE STRIPED -->
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Daftar Mata Kuliah Dosen {{ $data->nama }}</h3>
									<div class="right">
										<button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></button>
									</div>
									</div>
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode</th>
													<th>Mata Kuliah</th>
													<th>Semester</th>
													
													
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 0; ?>
												@foreach($data->matkul as $data_s)
												<?php $no++; ?>
												<tr>
													<td>{{ $no }}</td>
													<td>{{ $data_s->kode }}</td>
													<td>{{ $data_s->nama }}</td>
													<td>{{ $data_s->semester }}</td>
													
													
													<td><a href="/siswa/{{$data->id}}/{{$data_s->id}}/hapusnilai" class="lnr lnr-trash"onclick="return confirm('Apakah Yakin Anda Ingin Menghapus?')"></a></td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							<!-- END TABLE STRIPED -->
								<div class="panel">
									<div id="chartNilai"></div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Input Data Nilai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{ $data->id }}/addnilai" method="POST">
        	{{csrf_field()}}
          
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nilai</label>
		    <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai">
		  </div>		  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      	</form>
    </div>
  </div>


<!--EndModal-->
@stop
