<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> | SMK N 2 ADIWERNA</title>
	<link href="<?php echo base_url().'smik.png' ?>" rel="shortcut icon" type="image/ico" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>css/main.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/cerulean.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/table/' ?>css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>css/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/' ?>css/jquery-ui.theme.css">


	<script src="<?php echo base_url().'assets/' ?>js/jquery.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/bootstrap.js"></script>
	<?php $data = $this->db->query('SELECT * FROM gambar WHERE kategori = "background" GROUP BY id DESC LIMIT 1')->row_array(); ?>
	<style type="text/css">
		body{
			background-image: url('<?php echo base_url().'assets/images/'.$data['gambar']; ?>');
			background-attachment: fixed;
		}
		.panel > .panel-heading{
			color:#fff;
			font-weight: bold;
		}
	</style>
</head>
<body>

	<div class="containers">
		<div class="container">
			<div class="col-sm-12" style="padding: 0;margin-right: 0;">
				<?php $data=$this->db->query('SELECT * FROM gambar WHERE kategori = "header" GROUP BY id DESC LIMIT 1')->row_array(); ?>
				<img src="<?php echo base_url().'assets/images/'.$data['gambar'] ?>" class="img-responsive" style="border-radius: 5px 5px 0 0;"> 
			</div> <!-- //header -->

			<div class="col-sm-12" style="border-right: 1px solid #FFFFFF;padding: 0;margin: 0;">
			<hr style="border-bottom: 2px solid #333333;padding: 0;margin: 0;">
			</div>

			<div class="col-sm-12 menu">
				<style type="text/css">
					.navbar {
						border-radius: 0px;
					}
					.navbar-nav > li > a{
						/*color: #FFFFFF;*/
					}
					.navbar-nav > li > a:hover{
						/*color: #3d537e;*/
					}
					.navbar-nav > .dropdown:hover > a{
						/**background-color: #eee;*/
						/*color: #3d537e;*/
					}
					.navbar-nav > .dropdown:hover > .dropdown-menu{
					  display: block;
					}
					.navbar-nav > .dropdown > .dropdown-menu > li:hover > #submenu{
						display: block;
					}
					.dropdown-menu>li{
						position:relative;
						-webkit-user-select: none;       
						-moz-user-select: none;
						-ms-user-select: none;
						-o-user-select: none;
						user-select: none;
						cursor:pointer;
					}
					.dropdown-menu .sub-menu {
					    left: 100%;
					    position: absolute;
					    top: 0;
					    display:none;
					    margin-top: 10px;
						border-top-left-radius:0;
						border-bottom-left-radius:0;
						border-left-color:#fff;
						box-shadow:none;
					}
					.right-caret:after,.left-caret:after{
						content:"";
					    border-bottom: 5px solid transparent;
					    border-top: 5px solid transparent;
					    display: inline-block;
					    height: 0;
					    vertical-align: middle;
					    width: 0;
						margin-left:5px;
					}
					.right-caret:after{
						border-left: 5px solid #337ab7;
					}
					.left-caret:after{
						border-right: 5px solid #337ab7;
					}
					.affix {
						top : 0;
						width: 100%;
						right: 0;
						margin-left: 0;
						z-index: 1000;
					}
				</style>
<nav class="navbar navbar-inverse" role="navigation" data-spy="affix" data-offset-top="210">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown">
						<a href="#">Profil <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'direktori/halaman/profile' ?>">Profil Lengkap</a></li>
							<li><a href="<?php echo base_url().'direktori/halaman/struktur-organisasi' ?>">Struktur Organisasi</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/sejarah' ?>">Sejarah</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/visi-misi' ?>">VISI dan MISI</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/fasilitas' ?>">Fasilitas</a></li>
				            <!-- <li role="separator" class="divider"></li> -->
						</ul>
					</li>
					<li class="dropdown">
						<a href="#">Program Keahlian <i class="caret"></i></a>
						<ul class="dropdown-menu">
						<?php  
							$get_data = $this->db->get('jurusan')->result();
							
							foreach ($get_data as $row) 
							{
								echo '<li><a href="'.site_url('program-keahlian/'.$row->id."_".url_title($row->nama)).'">'.$row->nama.'</a></li>';
							}
						?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#">Bank Data <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'direktori/guru' ?>">Data Guru</a></li>
							<li><a href="<?php echo base_url().'direktori/staf' ?>">Data Staf</a></li>
				            <li><a href="<?php echo base_url().'direktori/siswa' ?>">Data Siswa</a></li>
				            <li><a href="<?php echo base_url().'direktori/alumni' ?>">Data Alumni</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#">Prestasi <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url().'direktori/halaman/prestasi-sekolah' ?>">Prestasi Sekolah</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/prestasi-guru' ?>">Prestasi Guru</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/prestasi-siswa' ?>">Prestasi Siswa</a></li>
						</ul>
					</li>
					<li class="dropdown">
			          	<a href="#">Kesiswaan <span class="caret"></span></a>
			          	<ul class="dropdown-menu">
				            <li><a href="<?php echo base_url().'direktori/halaman/osis' ?>">OSIS</a></li>
				            <li><a href="<?php echo base_url().'direktori/halaman/extra-kurikuler' ?>">Ekstra Kurikuler</a></li>
			          	</ul>
			        </li>
			        <li><a href="<?php echo base_url().'gallery' ?>">Gallery</a></li>
			        <li><a href="<?php echo base_url().'forum' ?>">Forum Diskusi</a></li>
					<script type="text/javascript">
						$(function(){
							$(".dropdown-menu > li > a.trigger").on("click",function(e){
								var current=$(this).next();
								var grandparent=$(this).parent().parent();
								if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
									$(this).toggleClass('right-caret left-caret');
								grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
								grandparent.find(".sub-menu:visible").not(current).hide();
								current.toggle();
								e.stopPropagation();
							});
							$(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
								var root=$(this).closest('.dropdown');
								root.find('.left-caret').toggleClass('right-caret left-caret');
								root.find('.sub-menu:visible').hide();
							});
						});
					</script>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
			</div>

			<?php echo $contents ?>
			
			<div class="col-lg-12 footer-top">
				<div class="row">
					<div class="col-sm-4">
						<legend style="border-bottom: 1px dashed;"><i class="glyphicon glyphicon-link"></i> Link Terkait</legend>
				  		<div class="panel panel-default">
				  			<div class="panel-body">
						  		<?php $data=$this->db->get('external_link');
						  		foreach ($data->result() as $row) {
						  			echo '<li><a href="'.$row->url.'" target="_blank">'.$row->judul.'</a></li>';
						  		}
						  		?>				  				
				  			</div>
				  		</div>

					</div><!-- footer left -->

					<div class="col-lg-4">
						<legend style="border-bottom: 1px dashed;"><i class="glyphicon glyphicon-map-marker"></i> Alamat Sekolah</legend>
						<div class="panel panel-default">
							<div class="panel-body">	
								<div class="embed-responsive embed-responsive-16by9">
									<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14091.659788670413!2d109.1262479!3d-6.9379709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5661ada80adce473!2sSMK+Negeri+2+Adiwerna!5e1!3m2!1sid!2sid!4v1473114715595" class="embed-responsive-item" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
								<p>Jl. Anggrek Ujungusi RT. 30/RW. 03, Ujungrusi, Adiwerna, Tegal, Jawa Tengah 52415</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4" style="margin-bottom: 20px">
						<legend style="border-bottom: 1px dashed;"><i class="glyphicon glyphicon-calendar"></i> Kalender</legend>
						<div id="datepicker"></div>
					</div><!-- footer right -->
				</div>
			</div><!-- footer top -->

			<div class="col-sm-12 footer-button">
				<p>COPYRIGHT @ <?php echo date('Y') ?> SMK N 2 ADIWERNA KAB. TEGAL</p>
			</div>

		</div><!-- container -->
	</div><!-- containers -->

	<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/npm.js"></script>

	<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/jquery-ui.js"></script>

	<!-- DataTables JavaScript -->
	<script type="text/javascript" src="<?php echo base_url().'assets/table/' ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/table/js/dataTables.bootstrap.min.js"></script>

	<script>
	    $(document).ready(function() {
		   $('#example').DataTable();
		} );

		$( "#datepicker" ).datepicker({
			inline: true
		});

		$(function() {
		    $( "#dialog" ).dialog();
		});
	</script>
	
</body>
</html>