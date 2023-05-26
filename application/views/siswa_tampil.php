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
                                <th>Nomor Induk</th>
                                <th>Nama Siswa</th>
                                <th>Nilai Akhir Angka</th>
                                <th>Nilai Akhir Huruf</th>
                                <th>Tanggal dan Jam Simpan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach($siswa as $index => $data): ?>

                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?php echo $data['nomor_induk']; ?></td>
                                <td><?php echo $data['nama_siswa']; ?></td>
                                <td><?php echo $data['nilai_akhir_angka']; ?></td>
                                <td><?php echo $data['nilai_akhir_huruf']; ?></td>
                                <td><?php echo $data['tanggal_jam_simpan']; ?></td>
                                <td>

                                    <a title="Edit Mahasiswa"
                                        href="<?php echo site_url('siswa/edit/'.$index); ?>"
                                        class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>

                                    <a title="Hapus Mahasiswa"
                                        href="<?php echo site_url('siswa/hapus/'.$index); ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
                                </td>
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

