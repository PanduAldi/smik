			
			
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
                <script>
                    $(function(){
                        $('#datajson').dataTable({
                            "processing" : true,
                            "serverSide" : true,
                            "ajax" : {
                                "url" : "<?php echo site_url('direktori/siswa_json') ?>",
                                "type" : "POST"
                            },
                            "columns" : [
                                            { data : 'nis'},
                                            { data : 'nama'},
                                            { data : 'alamat'},
                                            { data : 'jk'},
                                            { data : 'agama'},
                                            { data : 'ttl'},
                                            { data : 'kelas'}
                                        ],
                            "scrollX" : true,
                            "language" : {
                                "lengthMenu" : "_MENU_",
                                'infoEmpty' : "Data Masih Kosong",
                                'zeroRecords' : "Data yang dicari tidak ada"
                            },
                            buttons : [
                                        {
                                        extend: 'copy',
                                        text: '<u>C</u>opy',
                                        key: {
                                            key: 'c',
                                            altKey: true
                                        }
                                    }
                            ]
                        });
                    })
                </script>
                <div class="container-fluid">
                    
                <h3 class="breack">Data Siswa</h3>
                <br>
                <table id="datajson" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>JK</th>
                            <th>Agama</th>
                            <th>TTL</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>

                </table>
                </div>
			</div><!-- content -->
            <?php $this->load->view('main/v_sidebar') ?>