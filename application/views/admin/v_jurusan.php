        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Dashboard / <?php echo $title ?></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-sm-12">
                        <div class="info">
                            <?php echo $this->session->flashdata('info'); ?>    
                        </div>
                        <a href="<?php echo site_url('dashboard/add_prog_keahlian') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Daftar Program Keahlian
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nama Jurusan</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Update</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($get_keahlian as $row){ ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php $text = $row->isi; echo strip_tags(substr($text,0,100)) ?></td>
                                                <td><?php echo $row->tgl_update ?></td>
                                                <td align="center"><a title="Edit" href="<?php echo base_url().'dashboard/edit_prog_keahlian/'.$row->id ?>"> <i class="fa fa-edit"></i></a> | <a href="<?php echo site_url('dashboard/delete_prog_keahlian/'.$row->id) ?>" title="hapus"><i class="fa fa-trash"></i></a>
                                                 </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <script>
            $(document).ready(function(){
                $(".info").delay(2000).fadeOut(500);
            });
        </script>