		

			<div class="col-sm-9 content">
				<div class="panel panel-default welcome">
				  	<div class="panel-heading"> <?php echo $forum['judul'] ?></div>
				  	<div class="panel-body">
				    	<div class="media">
						  	<div class="media-left media-top">
						    	<a href="#">
						      		<img width="64px" class="media-object" src="<?php echo base_url().'assets/' ?>images/forum.png" alt="...">
						    	</a>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading"><b><?php echo $forum['oleh'] ?></b></h4>
						    	<span style="color:blue;"><i><?php echo date('d/m/Y',strtotime($forum['tanggal'])) ?></i> - <?php echo $forum['text'] ?></span>
						 	</div>
						</div><!-- Media -->
					<?php foreach($komen->result() as $row){ ?>
				    	<div class="media">
						  	<div class="media-left media-top">
						    	<a href="#">
						      		<img width="64px" class="media-object" src="<?php echo base_url().'assets/' ?>images/forumkomen.png" alt="...">
						    	</a>
						  	</div>
						  	<div class="media-body">
						    	<h4 class="media-heading"><?php echo $row->oleh ?></h4>
						    	<i><?php echo date('d/m/Y',strtotime($row->tanggal )) ?></i> - <?php echo $row->komen ?>
						 	</div>
						</div><!-- Media -->
					<?php } ?>
				  	</div>
				</div>
				<div class="panel panel-default welcome">
					<div class="panel-body">
				    	<?php echo form_open('forum/komen') ?>

						  	<div class="form-group col-sm-6" style="padding:0;">
							    <label>Oleh</label>
							    <input name="oleh" type="text" class="form-control" placeholder="Oleh" required="">
						  	</div>
						  	<div class="form-group col-sm-6" style="padding-right:0;">
							    <label>Email</label>
							    <input name="email" type="text" class="form-control" placeholder="Email" required="">
						  	</div>

						  	<div class="form-group">
							    <textarea name="komen" class="form-control" rows="4" placeholder="Tuliskan Komentar..." required=""></textarea>
						  		<input name="id" type="hidden" value="<?php echo $forum['id'] ?>">
						  	</div>
						  <button name="kirim" type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-send"></i> Kirim Komentar</button>
						</form>
					</div>
				</div>

			</div><!-- content -->
				<?php echo $sidebar ?>