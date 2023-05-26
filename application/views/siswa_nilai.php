<div class="content-wrapper container">

    <div class="page-heading">
        <h3>Data</h3>
    </div>
    <div class="page-content">

        <!-- Main content -->
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="<?php echo site_url('siswa/tambah_view'); ?>"><i
                            class="fas fa-fw fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nilai Akhir</th>
                                <th>Nilai Huruf</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach($nilai as $index => $data): ?>

                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?php echo $data['nilai_ku']; ?></td>
                                <td><?php echo $data['nilai_huruf']; ?></td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
        <!-- /.content -->
    </div>

</div>