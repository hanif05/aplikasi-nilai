@extends('layouts/Apps')	


@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if(session('berhasil'))
						<div class="alert alert-success" role="alert" >
							{{ session('berhasil') }}
						</div>

					@endif
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Mata Kuliah</h3>
									<div class="right">
										<button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></button>
									</div>
									
								</div>
								<div class="panel-body">
									<table class="table table-hover">
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
											<?php $i=0;?>
											@foreach($data as $matkul)
											<?php $i++?>
											<tr>
												<td>{{ $i }}</td>
												<td>{{ $matkul->kode }}</td>
												<td>{{ $matkul->nama }}</td>
												<td>{{ $matkul->semester }}</td>
												<td></td>
											</tr>
											@endforeach
										</tbody>

									</table>
								
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/dosen/tambah" method="POST">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama Dosen</label>
		    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Dosen">
		  </div>
		  <div class="form-group">
		    <label>No Telepon</label>
		    <input name="telp" type="text" class="form-control" placeholder="Masukan No Telp">
		  </div>
		  
		  <div class="form-group">
		    <label>Alamat</label>
		    <textarea name="alamat" class="form-control" rows="3"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      	</form>
    </div>
  </div>





@stop


