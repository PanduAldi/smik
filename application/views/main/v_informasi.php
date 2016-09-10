			
			<style type="text/css">
				.breack{
					border-bottom: 1px dashed #000000;
					margin-bottom: 15px;
					padding-bottom: 10px;
				}
				.content a:hover{
					text-decoration: none;
				}
			</style>
			<div class="col-sm-9 content">
				<h3><a href=""><?php echo $record['judul_content'] ?></a></h3>
				<div class="breack">
					<b>Penulis</b> : Admin | 
					<b>Tanggal</b> : <?php echo date('d M Y', strtotime($record['tanggal'])) ?> | 
					<b>Pukul</b> : <?php echo date('H:m:s', strtotime($record['tanggal'])) ?>
				</div>
				<p><?php echo $record['isi_content'] ?></p>
				<div class="breack"></div>
			</div><!-- content -->
			<?php $this->load->view('main/v_sidebar') ?>