@extends('layouts/Apps')	

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
                                    <h3 class="panel-title">Data Ranking</h3>
                                    
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Ranking</th>
                                                <th>Nama</th>
                                                <th>Nilai Rata-Rata</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0;?>
                                            @foreach(ranking5Besar() as $s)
                                            <?php $i++?>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><a href="/siswa/{{$s->id}}/profile">{{$s->namalengkap()}}</a></td>
                                                <td>{{$s->rata2}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                
                                </div>
                            </div>   
						</div>
					</div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="lnr lnr-user"></i></span>
                                <p>
                                    <span class="number">{{totalsiswa()}}</span>
                                    <span class="title">Total Siswa</span>
                                </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="lnr lnr-user"></i></span>
                                <p>
                                    <span class="number">{{totaldosen()}}</span>
                                    <span class="title">Total Dosen</span>
                                </p>
                        </div>
                    </div>


                    
                                
				</div>
			</div>
		</div>
	</div>

@stop
