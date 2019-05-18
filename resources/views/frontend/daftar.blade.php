@extends('layouts/frontend')

@section('content')
<section class="banner-area relative about-banner" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Registration				
				</h1>	
				<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Registration</a></p>
			</div>	
		</div>
	</div>
</section>
<section class="search-course-area relative" style="background: unset;">
	
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5 col-md-6 search-course-left">
				<h1 class="text-black">
					Registration Here <br>
					Join Us
				</h1>
				<p>
					Dengan mudah mendapatkan informasi nilai-nilai akademik berbasis website dengan cepat.
				</p>
			</div>
			<div class="col-lg-5 col-md-6 search-course-right section-gap">
				{!! Form::open(['url' => '/register', 'method' => 'POST', 'class' => 'form-wrap']) !!}
					<h4 class="text-black pb-20 text-center mb-30">Registration</h4>		
					{!! Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama Depan']) !!}
					{!! Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama Belakang']) !!}
					<div class="form-select" id="service-select">
						{!! Form::select('jk', ['' => 'Pilih Jenis Kelamin','Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], ['class' => 'form-control']) !!}
					</div>
					<div class="form-select" id="service-select">
						{!! Form::select('agama', ['' => 'Pilih Agama','Islam' => 'Islam', 'Kristen' => 'Kristen', 'Khatolik' => 'Khatolik' ,'Buddha' => 'Buddha', 'Hindu' => 'Hindu'], ['class' => 'form-control']) !!}
					</div>
					{!! Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
					{!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
					<input type="submit" class="primary-btn text-uppercase" value="Daftar">
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@stop