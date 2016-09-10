	<div class="col-lg-3 sidebar">
				<div class="panel panel-default">
				  	<div class="panel-heading">
				  		<i class="glyphicon glyphicon-info-sign"></i> Informasi / Pengumuman 
				  	</div>
				  	<div class="panel-body">
				  		<?php foreach($informasi->result() as $row){ ?>
				    	<div class="alert alert-info">
				    		<style>
								.breack{
									border-bottom: 1px dashed #000000;
									margin-bottom: 0px;
									padding-bottom: 0px;
									font-weight: bold;
								}
				    		</style>
						  	<div class="breack"><i class="fa fa-info"></i><a href="<?php echo site_url('home/informasi/'.$row->id) ?>"> <?php echo ucwords($row->judul_content) ?></a> 
						  		</div>
						  		<?php echo substr(strip_tags($row->isi_content), 0,50)."..." ?>
						</div>
						<?php } ?>
				  	</div>
				</div><!-- //default -->
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-chat"></i> Chat Box
					</div>
					<div class="panel-body">
						<div id="cboxdiv" style=" border-style: dashed; position: relative; margin: 0 auto; width: 100%; font-size: 0; line-height: 0;">
						<div style="position: relative; height: 300px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border: 0px solid;"><iframe src="http://www7.cbox.ws/box/?boxid=805921&boxtag=aqqc5c&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain7-805921" id="cboxmain7-805921"></iframe></div>
						<div style="position: relative; height: 80px; overflow: hidden; border: 0px solid; border-top: 0px;"><iframe src="http://www7.cbox.ws/box/?boxid=805921&boxtag=aqqc5c&sec=form" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform7-805921" id="cboxform7-805921"></iframe></div>
						</div>
					</div>
				</div>				

				<div class="panel panel-default">
				  	<div class="panel-heading">
				  		<i class="glyphicon glyphicon-picture"></i> Banner
				  	</div>
				  	<div class="panel-body">
				  	<?php foreach($banner->result() as $row){ ?>
				    	<a href="<?php echo $row->link ?>" target="_blank">
				    	<img src="<?php echo base_url().'assets/images/'.$row->gambar ?>" class="img-responsive"></a>
				    <?php } ?>
				  	</div>
				</div><!-- //default -->



			</div><!-- //sidebar -->