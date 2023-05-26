<?php
defined('BASEPATH') OR exit('Akses skrip langsung tidak diizinkan');

class Siswa extends CI_Controller {

    public function edit($id_siswa)
    {
        // Membaca file menjadi array
        $lines = file(APPPATH.'../assets/siswa.csv', FILE_IGNORE_NEW_LINES);
    
        // Mengurutkan data siswa secara descending berdasarkan nilai akhir
        usort($lines, function($a, $b) {
            $siswa_info_a = explode(',', $a);
            $siswa_info_b = explode(',', $b);
            $nilai_akhir_a = isset($siswa_info_a[2]) ? $siswa_info_a[2] : 0;
            $nilai_akhir_b = isset($siswa_info_b[2]) ? $siswa_info_b[2] : 0;
            return $nilai_akhir_b - $nilai_akhir_a;
        });
    
        if (isset($lines[$id_siswa])) {
            $siswa_info = explode(',', $lines[$id_siswa]);
    
            $data['id_siswa'] = $id_siswa;
            $data['nomor_induk'] = $siswa_info[0];
            $data['nama_siswa'] = $siswa_info[1];
            $data['nilai_akhir_angka'] = $siswa_info[2];
    
            // Mengirim data flash ke view
            $data['message'] = $this->session->flashdata('message');
    
            // Memuat view
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('siswa_edit', $data);
            $this->load->view('layouts/footer', $data);
        } else {
            $this->session->set_flashdata('message', array(
                'text' => 'ID siswa tidak valid.',
                'type' => 'error'
            ));
            redirect('siswa');
        }
    }

    public function update()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nomor_induk = $this->input->post('nomor_induk');
        $nama_siswa = $this->input->post('nama_siswa');
        $nilai_akhir_angka = $this->input->post('nilai_akhir_angka');
        
        function konversiNilai($nilai)
        {
            if ($nilai >= 80) {
                return 'A';
            } elseif ($nilai >= 70) {
                return 'B';
            } elseif ($nilai >= 70) {
                return 'C';
            } elseif ($nilai >= 60) {
                return 'D';
            } else {
                return 'E';
            }
        }
    
        $nilai_akhir_huruf = konversiNilai($nilai_akhir_angka);
    
        // Mendapatkan tanggal dan jam saat ini
        $tanggal_jam_simpan = date('d-m-Y H:i:s');
        
        // Membaca file menjadi array
        $lines = file(APPPATH.'../assets/siswa.csv', FILE_IGNORE_NEW_LINES);
    
        if (isset($lines[$id_siswa])) {
            // Mengganti baris dengan nilai baru
            $lines[$id_siswa] = "$nomor_induk,$nama_siswa,$nilai_akhir_angka,$nilai_akhir_huruf,$tanggal_jam_simpan";
    
            // Menggabungkan array menjadi string untuk ditulis ke file
            $data_string = implode("\n", $lines);
    
            // Menulis string ke file, menggantikan konten yang ada
            $file = fopen(APPPATH.'../assets/siswa.csv', 'w');
            fwrite($file, $data_string);
            fclose($file);
    
            $this->session->set_flashdata('message', array(
                'text' => 'Data siswa telah diperbarui.',
                'type' => 'info'
            ));
            redirect('siswa');
        } else {
            $this->session->set_flashdata('message', array(
                'text' => 'ID siswa tidak valid.',
                'type' => 'error'
            ));
            redirect('siswa');
        }
    }

    public function tambah()
    {
        $nomor_induk = $this->input->post('nomor_induk');
        $nama_siswa = $this->input->post('nama_siswa');
        $nilai_akhir_angka = $this->input->post('nilai_akhir_angka');
    
        if (empty($nomor_induk) || empty($nama_siswa) || empty($nilai_akhir_angka)) {
            $this->session->set_flashdata('message', array(
                'text' => 'Harap masukkan semua informasi yang diperlukan.',
                'type' => 'error'
            ));
            redirect('siswa/tambah');
        }
    
        // Fungsi untuk mengonversi nilai angka menjadi huruf
        function konversiNilai($nilai)
        {
            if ($nilai >= 80) {
                return 'A';
            } elseif ($nilai >= 70) {
                return 'B';
            } elseif ($nilai >= 70) {
                return 'C';
            } elseif ($nilai >= 60) {
                return 'D';
            } else {
                return 'E';
            }
        }
    
        $nilai_akhir_huruf = konversiNilai($nilai_akhir_angka);
    
        // Mendapatkan tanggal dan jam saat ini
        $tanggal_jam_tambah = date('d-m-Y H:i:s');
    
        // Menambahkan data siswa ke file CSV
        $file = fopen(APPPATH.'../assets/siswa.csv', 'a');
        if ($file) {
            fwrite($file, "\n" . $nomor_induk . ',' . $nama_siswa . ',' . $nilai_akhir_angka . ',' . $nilai_akhir_huruf . ',' . $tanggal_jam_tambah);
            fclose($file);
    
            $this->session->set_flashdata('message', array(
                'text' => 'Data siswa telah ditambahkan.',
                'type' => 'success'
            ));
            redirect('siswa');
        } else {
            $this->session->set_flashdata('message', array(
                'text' => 'Gagal membuka file siswa.csv.',
                'type' => 'error'
            ));
            redirect('siswa/tambah');
        }
    }
    
    public function tambah_view()
    {
        // Mengirim data flash ke view
        $data['message'] = $this->session->flashdata('message');
        $data['nomor_induk'] = $this->session->flashdata('nomor_induk');
        $data['nama_siswa'] = $this->session->flashdata('nama_siswa');
        $data['nilai_akhir_angka'] = $this->session->flashdata('nilai_akhir_angka');

        // Memuat view
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar',$data);
        $this->load->view('siswa_tambah', $data);
		$this->load->view('layouts/footer',$data);


    }

    public function daftar_view()
    {
        // Membaca file siswa.csv
        $file = fopen(APPPATH.'../assets/siswa.csv', 'r');
        $siswa = array();
    
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $siswa_info = explode(',', $line);
    
                if (count($siswa_info) == 5) {
                    $siswa[] = array(
                        'nomor_induk' => $siswa_info[0],
                        'nama_siswa' => $siswa_info[1],
                        'nilai_akhir_angka' => $siswa_info[2],
                        'nilai_akhir_huruf' => $siswa_info[3],
                        'tanggal_jam_simpan' => $siswa_info[4]
                    );
                }
            }
    
            fclose($file);
        }
    
        // Mengurutkan data siswa secara descending berdasarkan nilai akhir
        usort($siswa, function($a, $b) {
            return $b['nilai_akhir_angka'] - $a['nilai_akhir_angka'];
        });
    
        // Mengirim data siswa ke view
        $data['siswa'] = $siswa;
    
        // Memuat view
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('siswa_tampil', $data);
        $this->load->view('layouts/footer', $data);
    }
    
    
    public function kelola_view()
    {
        // Membaca file siswa.csv
        // Fungsi untuk mengonversi nilai angka menjadi huruf
        $file = fopen(APPPATH.'../assets/nilai.csv', 'r');
        $nilai = array();

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $nilai_info = explode(',', $line);

                if (count($nilai_info) == 2) {
                    $nilai[] = array(
                        'nilai_ku' => $nilai_info[0],
                        'nilai_huruf' => $nilai_info[1],
                    );
                }
            }

            fclose($file);
        }

        // Mengirim data siswa ke view
        $data['nilai'] = $nilai;

        // Memuat view
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar',$data);
        $this->load->view('siswa_nilai', $data);
		$this->load->view('layouts/footer',$data);

    }

    public function dashboard()
    {
// Mendapatkan data siswa dari file siswa.csv
$file = fopen(APPPATH.'../assets/siswa.csv', 'r');
$siswa = array();

if ($file) {
    while (($line = fgets($file)) !== false) {
        $siswa_info = explode(',', $line);

        if (count($siswa_info) == 5) {
            $siswa[] = array(
                'nomor_induk' => $siswa_info[0],
                'nama_siswa' => $siswa_info[1],
                'nilai_akhir_angka' => $siswa_info[2],
                'nilai_akhir_huruf' => $siswa_info[3],
                'tanggal_jam_simpan' => $siswa_info[4]
            );
        }
    }

    fclose($file);
}

// Menghitung jumlah siswa berdasarkan nilai akhir huruf
$nilai_huruf_counts = array_count_values(array_column($siswa, 'nilai_akhir_huruf'));

// Menginisialisasi array untuk menyimpan data chart
$chart_data = array();

// Meloopi setiap nilai huruf dan jumlahnya, dan menambahkannya ke data chart
foreach ($nilai_huruf_counts as $nilai_huruf => $count) {
    $chart_data[] = array(
        'nilai_huruf' => $nilai_huruf,
        'jumlah' => $count
    );
}

// Mengurutkan data chart berdasarkan urutan huruf (A, B, C, D, E)
usort($chart_data, function ($a, $b) {
    return strcmp($a['nilai_huruf'], $b['nilai_huruf']);
});

// Mengirim data chart ke view
$data['chart_data'] = $chart_data;

// Memuat view dashboard dengan chart
$this->load->view('layouts/header', $data);
$this->load->view('layouts/sidebar', $data);
$this->load->view('dashboard', $data);
$this->load->view('layouts/footer', $data);

    }

    public function hapus($id_siswa)
    {
        // Membaca file menjadi array
        $lines = file(APPPATH.'../assets/siswa.csv', FILE_IGNORE_NEW_LINES);

        if (isset($lines[$id_siswa])) {
            // Menghapus baris dari array
            unset($lines[$id_siswa]);

            // Menggabungkan array menjadi string untuk ditulis ke file
            $data_string = implode("\n", $lines);

            // Menulis string ke file, menggantikan konten yang ada
            $file = fopen(APPPATH.'../assets/siswa.csv', 'w');
            fwrite($file, $data_string);
            fclose($file);

            $this->session->set_flashdata('message', array(
                'text' => 'Data siswa telah dihapus.',
                'type' => 'info'
            ));
            redirect('siswa');
        } else {
            $this->session->set_flashdata('message', array(
                'text' => 'ID siswa tidak valid.',
                'type' => 'error'
            ));
            redirect('siswa');
        }
    }
}