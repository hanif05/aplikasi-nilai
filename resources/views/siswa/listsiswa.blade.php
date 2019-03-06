@extends('layouts/Apps')	

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
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
										 <a href="/siswa/export" class="lnr lnr-download"></a>
										<button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></button>
									</div>
									
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
											<th>No</th>
											<th>Nama Depan</th>
											<th>Nama Belakang</th>
											<th>Jenis Kelamin</th>
											<th>Agama</th>
											<th>Alamat</th>
											<th>Rata-Rata Nilai</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tbody>
											<?php $no = 0;?>
											@foreach ($data_siswa as $siswa)
											<?php $no++; ?>
											<tr>
												<td>{{ $no }}</td>
												<td>{{ $siswa->nama_depan }}</a></td>
												<td>{{ $siswa->nama_belakang }}</a></td>
												<td>{{ $siswa->jk }}</td>
												<td>{{ $siswa->agama }}</td>
												<td>{{ $siswa->alamat }}</td>
												<td>{{ $siswa->rata2nilai() }}</td>
												<td>
											
													<a href="/siswa/{{$siswa->id}}/profile" class="lnr lnr-pencil"></a>
													<a href="/siswa/{{$siswa->id}}/hapus" class="lnr lnr-trash" onclick="return confirm('Apakah Yakin Anda Ingin Menghapus?')"></a>
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
		</div>
	</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/tambah" method="POST">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama Depan</label>
		    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan">
		  </div>
		  <div class="form-group">
		    <label>Nama Belakang</label>
		    <input name="nama_belakang" type="text" class="form-control" placeholder="Masukan Nama Belakang">
		  </div>
		  <div class="form-group">
		    <label>Email</label>
		    <input name="email" type="email" class="form-control" placeholder="Masukan Email">
		  </div>
		  <div class="form-group">
		    <label>Jenis Kelamin</label>
		    <select name="jk" class="form-control">
		      <option value="Laki-laki">Laki-Laki</option>
		      <option value="Perempuan">Perempuan</option>
		    </select>
		  <div class="form-group">
		    <label>Agama</label>
		    <select name="agama" class="form-control">
		      <option value="Islam">Islam</option>
		      <option value="Kristen">Kristen</option>
		      <option value="Budha">Budha</option>
		      <option value="Hindu">Hindu</option>
		      <option value="Konguchu">Konguchu</option>
		      <option value="Atheis">Atheis</option>
		    </select>
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

@endsection