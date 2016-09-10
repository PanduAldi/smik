			

			<div class="col-sm-9 content">
			
				<div class="panel panel-default welcome">
				  	<div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Tambah Topik</div>
				  	<div class="panel-body">
				    	<?php echo form_open('forum/add_topik') ?>
						  	<div class="form-group col-sm-6" style="padding:0;">
							    <label>Oleh</label>
							    <input name="oleh" type="text" class="form-control" placeholder="Oleh" required="">
						  	</div>
						  	<div class="form-group col-sm-6" style="padding-right:0;">
							    <label>Email</label>
							    <input name="email" type="text" class="form-control" placeholder="Email" required="">
						  	</div>
						  	<div class="form-group">
							    <label>Judul</label>
							    <input name="judul" type="text" class="form-control" placeholder="Judul" required="">
						  	</div>
						  	<div class="form-group">
							    <label>Isi Topik</label>
							    <textarea name="isitopik" class="form-control" rows="6" placeholder="Isi Topik" required=""></textarea>
						  	</div><!-- 
						  	<div class="form-group">
						    	<label>File Input</label>
						    	<input type="file">
						    	<p class="help-block">Extensi file upload ( rar | zip | doc | xml | pdf | jpg | png | gif )</p>
						  	</div> -->
						  <button name="simpan" type="submit" class="btn btn-default"><i class="glyphicon glyphicon-send"></i> Mulai Diskusi</button>
						</form>
				  	</div>
				</div>

			</div><!-- content -->
			<?php echo $sidebar ?>