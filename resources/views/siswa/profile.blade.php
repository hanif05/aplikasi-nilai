@extends('layouts/Apps')


@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop


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
										<h3 class="name">{{ $data->nama_depan }} {{ $data->nama_belakang }}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{ $data->matkul->count() }} <span>Mata Kuliah</span>
											</div>
											<div class="col-md-4 stat-item">
												{{ $data->rata2nilai() }} <span>Rata-Rata Nilai</span>
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
											
											<li>Jenis Kelamin <span>{{ $data->jk }}</span></li>
											<li>Agama <span>{{ $data->agama }}</span></li>
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
										<h3 class="panel-title">Data Nilai</h3>
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
													<th>Dosen</th>
													<th>Nilai</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 0;?>
												@foreach($data->matkul as $data_s)
												<?php $no++;?>
												<tr>
													<td>{{ $no }}</td>
													<td>{{ $data_s->kode }}</td>
													<td>{{ $data_s->nama }}</td>
													<td>{{ $data_s->semester }}</td>
													<td><a href="/dosen/{{$data_s->dosen_id}}/profile">{{ $data_s->dosen->nama }}</a></td>
													<td><a href="#" class="nilai" data-type="text" data-pk="{{$data_s->id}}" data-url="/api/siswa/{{$data->id}}/editnilai" data-title="Masukan Nilai">{{ $data_s->pivot->nilai }}</a></td>
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
		    <label>Mata Kuliah</label>
		    <select name="matkul" class="form-control">
		      @foreach($matkul as $mt)
		      	<option value="{{$mt->id}}">{{ $mt->nama }}</option>

		      @endforeach
		    </select>
		  </div>
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
@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartNilai', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Laporan Nilai'
	    },
	    subtitle: {
	        text: 'Grafik Chart Nilai'
	    },
	    xAxis: {
	        categories: {!! json_encode($categori) !!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Nilai'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Nilai',
	        data: {!!json_encode($nilai)!!}

	    }]
	});

    $(document).ready(function() {
        $('.nilai').editable();
    });
</script>
@stop