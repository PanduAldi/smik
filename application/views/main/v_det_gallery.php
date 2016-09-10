				
				<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
				<div class="col-sm-9 content">

				<div class="panel panel-default welcome">
					<div class="panel-body">
					    <h2><?php echo $record->nama ?></h2>
					    <hr>
					    <?php echo $record->embed ?>
					</div>

					<script type="text/javascript">
						$(document).ready(function(){
						    //FANCYBOX
						    //https://github.com/fancyapps/fancyBox
						    $(".fancybox").fancybox({
						        openEffect: "none",
						        closeEffect: "none"
						    });
						});
					</script>
				</div>
				<!-- welcome -->
			</div><!-- content -->

<?php $this->load->view('main/v_sidebar') ?>