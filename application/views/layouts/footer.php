            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>
                                <script>
                                document.write(new Date().getFullYear());
                                </script> &copy; Data Siswa
                            </p>
                        </div>
                        <div class="float-end">
                            <p>Dibangun dengan penuh <span class="text-danger"><i class="bi bi-heart"></i></span> </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
            </div>
            <script src="assets/js/pages/horizontal-layout.js"></script>

            <!-- file multiple mahasiswa  -->
            <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
            <script src="<?= base_url() ?>assets/js/app.js"></script>

            <!-- Need: Apexcharts -->
            <script src="<?= base_url() ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>


            <script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/datatables.js"></script>
            <script src="<?= base_url() ?>assets/extensions/parsleyjs/parsley.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/parsley.js"></script>
            <script src="assets/extensions/toastify-js/src/toastify.js"></script>
            <script src="assets/js/pages/toastify.js"></script>
            <script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.js"></script>
            <script src="<?= base_url() ?>assets/extensions/filepond/filepond.js"></script>
            <script src="<?= base_url() ?>assets/extensions/toastify-js/src/toastify.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/filepond.js"></script>
            <script src="<?= base_url() ?>assets/extensions/tinymce/tinymce.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/tinymce.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/jquery.backstretch.min.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/retina-1.1.0.min.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/scripts.js"></script>
            <script src="<?= base_url() ?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/form-element-select.js"></script>
            <script>
$(function() {
    $("#table2").DataTable();
    $("#table3").DataTable();
});
            </script>
            <script type="text/javascript">
	$(document).ready(function() {
	    $('#tabelData').DataTable();
	    function filterData () {
		    $('#tabelData').DataTable().search(
		        $('.nomor_induk').val()
		    	).draw();
		}
		$('.nomor_induk').on('change', function () {
	        filterData();
	    });
	});
</script>
            <!-- toast flashdata -->
            <?php if ($this->session->flashdata('success')): ?>
            <div class="success-message"><?= $this->session->flashdata('success') ?></div>
            <script type="text/javascript">
toastr.success($(".success-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('info')): ?>
            <div class="info-message"><?= $this->session->flashdata('info') ?></div>
            <script type="text/javascript">
toastr.info($(".info-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('warning')): ?>
            <div class="warning-message"><?= $this->session->flashdata('warning') ?></div>
            <script type="text/javascript">
toastr.warning($(".warning-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="error-message"><?= $this->session->flashdata('error') ?></div>
            <script type="text/javascript">
toastr.error($(".error-message"))
            </script>
            <?php endif; ?>

            </body>

            </html>