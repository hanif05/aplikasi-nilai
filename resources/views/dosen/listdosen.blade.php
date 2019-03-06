@extends('layouts/Apps')	

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@stop
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if(session('berhasil'))
						{{alertsukses()}}

					@endif
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Dosen</h3>
									<div class="right">
										<button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></button>
									</div>
									
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Dosen</th>
												<th>No Telepon</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 0;?>
											@foreach($data as $data_dosen)
											<?php $no++;?>
											<tr>
												<td>{{$no}}</td>
												<td><a href="#" class="nama" data-type="text" data-pk="{{$data_dosen->id}}" data-url="/api/dosen/{{$data_dosen->id}}/editnama" data-title="Masukan Nama Dosen">{{ $data_dosen->nama }}</a></td>
												<td>{{ $data_dosen->telp }}</td>
												<td>{{ $data_dosen->alamat }}</td>
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


@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script >
	$(document).ready(function() {
    	$('.nama').editable();
    });
</script>

@stop