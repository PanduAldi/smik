			<div class="col-sm-9 content">
                <style type="text/css">
                    .breack{
                        border-bottom: 1px dashed #000000;
                        padding-bottom: 10px;
                        margin-top: -5px;
                        margin-bottom: 15px;
                    }
                    /*.content a:hover{
                        text-decoration: none;
                    }
                    .panel{
                        margin-right: -15px;*/
                    }
                </style>
				<div class="panel panel-default welcome">
                    <div class="panel-body">
                        <h3 class="breack"><?php echo $record['nama'] ?></h3>
                        <?php echo $record['isi'] ?>
                    </div>
                </div>
			</div><!-- content -->
            <?php $this->load->view('main/v_sidebar') ?>