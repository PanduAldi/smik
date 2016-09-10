			
			<div class="col-sm-9 content" style="padding-right:0px;">
                <style type="text/css">
                    .breack{
                        border-bottom: 1px dashed #000000;
                        margin-bottom: 15px;
                        padding-bottom: 10px;
                    }
                    .content a:hover{
                        text-decoration: none;
                    }
                </style>
                <div class="container-fluid">
                <h3 class="breack">Data Alumni</h3>
                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>JK</th>
                            <th>Agama</th>
                            <th>TTL</th>
                            <th>Tahun Lulus</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($record->result() as $row){ ?>
                        <tr class="gradeU">
                            <td><?php echo $no ?></td>
                            <td><?php echo $row->nis ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->alamat ?></td>
                            <td><?php echo $row->jk ?></td>
                            <td><?php echo $row->agama ?></td>
                            <td><?php echo $row->ttl ?></td>
                            <td><?php echo $row->angkatan ?></td>
                        </tr>
                    <?php $no++; } ?>
                    </tbody>
                </table>
                </div>
			</div><!-- content -->
            <?php $this->load->view('main/v_sidebar') ?>
            