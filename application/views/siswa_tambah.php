<div class="content-wrapper container">

    <div class="page-heading">
        <h3>Tambah Data Siswa</h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('siswa/daftar_view'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form method="POST" class="form" action="<?php echo site_url('siswa/tambah'); ?>"
                        data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <tr>
                                    <td><label for="Nidn_Nidk">Nomor Induk</label></td>
                                    <td>
                                            <div class="position-relative">
                                                <input name="nomor_induk" type="number" class="form-control" placeholder="Nomor Induk"
                                                    id="Nidn_Nidk" data-parsley-required="true">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama Siswa</label></td>
                                    <td>
                                            <div class="position-relative">
                                                <input name="nama_siswa" type="text" class="form-control" placeholder="Nama Siswa"
                                                    id="nama" data-parsley-required="true">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Nidn_Nidk">Nilai Akhir Angka</label></td>
                                    <td>
                                            <div class="position-relative">
                                                <input name="nilai_akhir_angka" type="number" class="form-control" placeholder="Nilai Akhir Angka"
                                                    id="Nidn_Nidk" data-parsley-required="true">
                                        </div>
                                    </td>
                                </tr>

                        </div>
                        </table>

                        <br>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>