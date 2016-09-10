			
			
			<div class="col-sm-9 content" style="padding-right:0px;">
                <h2 style="border-bottom: 1px dashed #000000;padding-bottom: 10px;margin-bottom: 10px;">Detail Guru</h2>
                <div class="col-sm-3" style="border: 1px solid #DDD;padding: 0;">
                    <img src="<?php $gambar = $record['photo']; 
                        if ($gambar != ''){
                            echo base_url().'upload/photo/'.$record['photo'];
                        }else{
                            echo base_url().'assets/images/no-image.jpg';
                        } ?>" class="img-responsive">
                </div>
                <div class="col-sm-8" style="padding:0;margin-left:10px;margin-right:0;">
                    <table class="table">
                        <tr>
                            <td><b>Nama</b></td>
                            <td> : <?php echo $record['nama'] ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><b>NIP</b></td>
                            <td> : <?php echo $record['nip'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td> : <?php echo $record['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td> : <?php echo $record['jk'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Golongan</b></td>
                            <td> : <?php echo $record['golongan'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Bid. Studi</b></td>
                            <td> : <?php echo $record['bidang_studi'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Kelas</b></td>
                            <td> : <?php echo $record['kelas'] ?></td>
                        </tr>
                    </table>
                </div>
			</div><!-- content -->
            <?php $this->load->view('main/v_sidebar') ?>