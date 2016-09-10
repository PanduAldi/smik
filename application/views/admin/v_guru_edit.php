        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Dashboard / Guru</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Edit data guru
                        </div>
                        <div class="panel-body">
                            <?php echo form_open_multipart('dashboard/guru_edit') ?>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="col-sm-12" style="border: 1px solid #000000;padding: 0;margin-bottom:2px;margin-left:0;">
                                        <img src="<?php $gambar = $record['photo']; 
                                            if ($gambar != ''){
                                                echo base_url().'upload/photo/'.$record['photo'];
                                            }else{
                                                echo base_url().'assets/images/no-image.jpg';
                                            } ?>" class="img-responsive">
                                    </div>
                                    <!-- <label>Photo</label> -->
                                    <input name="gambar" type="file" style="border:1px solid #ddd;padding:10px;width:100%;background-color:#fffac0;">
                                    <!-- <p class="help-block" style="margin-top: -15px;">jpg | png | gif</p> -->
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>NIP/NIS</label>
                                    <input value="<?php echo $record['nip'] ?>" name="nis" type="text" class="form-control" placeholder="NIP / NIS" id="nis" required="">
                                    <input name="id" type="hidden" value="<?php echo $record['id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input value="<?php echo $record['nama'] ?>" name="nama" type="text" class="form-control" placeholder="Nama" id="nama" required="">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="1" placeholder="Alamat" id="alamat" required=""><?php echo $record['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <p><input type="radio" name="jk" value="pria" checked> Laki-laki
                                    <input type="radio" name="jk" value="wanita" style="margin-left:15px;"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input value="<?php echo $record['agama'] ?>" name="agama" type="text" class="form-control" placeholder="Agama" id="nama" required="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Golongan</label>
                                    <input value="<?php echo $record['golongan'] ?>" name="golongan" type="text" class="form-control" placeholder="Golongan" id="nama" required="">
                                </div>
                                <div class="form-group">
                                    <label>Bidang Studi</label>
                                    <input value="<?php echo $record['bidang_studi'] ?>" name="bidangstudi" type="text" class="form-control" placeholder="Bidang studi" id="nama" required="">
                                </div>
                                <div class="form-group">
                                    <label>Kelas Yang Diajarkan</label>
                                    <input value="<?php echo $record['kelas'] ?>" name="kelas" type="text" class="form-control" placeholder="Kelas yang diajarkan" id="nama" required="">
                                </div>
                                <div class="form-group">
                                    <label>Ijazah Terakhir</label>
                                    <input value="<?php echo $record['ijazah_trakhir'] ?>" name="ijazah" type="text" class="form-control" placeholder="Ijazah terakhir" id="nama" required="">
                                </div>
                            </div>
                            <div class="col-sm-12" style="border-top:1px solid #000;margin:0; padding-top:10px;">
                                <button name="simpan" type="submit" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-ok"></i> Update</button> | 
                                <a href="<?php echo base_url().'dashboard/guru' ?>"> Batal</a>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>