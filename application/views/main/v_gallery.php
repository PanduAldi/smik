				
				
				<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/thumbnail.css">
				<div class="col-lg-9 content">
				<div class="container-fluid">
				<div class="panel panel-default welcome">
					<style type="text/css">
						/*.gallery{
						    display: inline-block;
						    margin-top: 20px;
						}*/
					</style>
					<div class="panel-body">
					    <div class="row">
					    <?php foreach($record->result() as $row){ ?>
						  	<!--<div class="col-xs-6 col-md-4">
							    
							    <a href="<?php echo base_url().'upload/gallery/'.$row->gambar ?>" class="fancybox thumbnail" rel="ligthbox">
							      	<img src="<?php echo base_url().'upload/gallery/'.$row->gambar ?>">
							    </a>
						  	</div> -->
							<div class="col-lg-4 col-md-4 col-xs-6">
								<div class="thumbnail">
									<div class="caption">
										<h4>
											<a href="<?php echo site_url('gallery/detail_gallery/'.$row->id) ?>" style="margin-top: 30px; color: white; text-decoration: none;"><?php echo $row->nama ?></a>
										</h4>
					                    <p><a href="<?php echo site_url('gallery/detail_gallery/'.$row->id) ?>" class="btn btn-success btn-sm">Detail Gallery</a></p>
									</div>
									<img src="<?php echo base_url().'upload/gallery/'.$row->gambar ?>" alt="">
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<!-- welcome -->
				</div>
			</div><!-- content -->
<?php $this->load->view('main/v_sidebar') ?>