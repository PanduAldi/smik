        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Dashboard / <?php echo $title ?></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-sm-12">
                        <?php echo $this->session->flashdata('info'); ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Halaman
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <?php $this->load->view('admin/editor') ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Nama Program Keahlian</label>
                                        <input style="width: 50%;" name="nama" type="text" value="<?php echo $view->nama ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="isi" class="form-control" rows="10"><?php echo $view->isi ?></textarea>
                                    </div>
                                    <button name="edit" type="submit" class="btn btn-primary">Edit</button> | <a class="btn btn-danger" href="<?php echo base_url().'dashboard/prog_keahlian' ?>"> Batal </a>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>