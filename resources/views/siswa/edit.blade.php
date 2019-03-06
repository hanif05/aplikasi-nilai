@extends('layouts/Apps')

@section('content')

	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Siswa</h3>
								</div>
								<div class="panel-body">
									<form action="/siswa/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
							        	{{csrf_field()}}
									  <div class="form-group">
									    <label for="exampleInputEmail1">Nama Depan</label>
									    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Depan" value="{{ $data->nama_depan }}">
									  </div>
									  <div class="form-group">
									    <label>Nama Belakang</label>
									    <input name="nama_belakang" type="text" class="form-control" placeholder="Masukan Nama Belakang" value="{{ $data->nama_belakang }}">
									  </div>
									  <div class="form-group">
									    <label>Jenis Kelamin</label>
									    <select name="jk" class="form-control">
									      <option value="Laki-laki" @if($data->jk == "Laki-laki") selected @endif>Laki-Laki</option>
									      <option value="Perempuan" @if ($data->jk == "Perempuan") selected @endif>Perempuan</option>
									    </select>
									   </div>
									  <div class="form-group">
									    <label>Agama</label>
									    <select name="agama" class="form-control">
									      <option value="Islam" @if($data->agama == "Islam") selected @endif>Islam</option>
									      <option value="Kristen" @if($data->agama == "Kristen") selected @endif>Kristen</option>
									      <option value="Budha" @if($data->agama == "Budha") selected @endif>Budha</option>
									      <option value="Hindu" @if($data->agama == "Hindu") selected @endif>Hindu</option>
									      <option value="Konguchu" @if($data->agama == "Konguchu") selected @endif>Konguchu</option>
									      <option value="Atheis" @if($data->agama == "Atheis") selected @endif>Atheis</option>
									    </select>
									  </div>
									  <div class="form-group">
									    <label>Alamat</label>
									    <textarea name="alamat" class="form-control" rows="3">{{ $data->alamat }}</textarea>
									  </div>
									  <div class="form-group">
									  	<label for="exampleInputEmail1">Foto</label>
									  	<input type="file" name="foto">
									  </div>
									  <button type="submit" class="btn btn-primary">Simpan</button>
									</form>

								</div>
							</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection