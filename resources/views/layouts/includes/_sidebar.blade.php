<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						
						@if(auth()->user()->level == 'admin')
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-database"></i> <span>Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="/siswa"><i class="lnr lnr-user"></i>Siswa</a></li>
									<li><a href="/dosen" class=""><i class="lnr lnr-user"></i>Dosen</a></li>
									<li><a href="/matkul" class=""><i class="lnr lnr-file-empty"></i>Mata Kuliah</a></li>
								</ul>
							</div>
						</li>
						@endif
					</ul>
				</nav>
			</div>
		</div>