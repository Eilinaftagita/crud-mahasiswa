<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    if (isset($_POST['nim'])) {
        // ambil data hasil submit dari form
        $nim           = mysqli_real_escape_string($db, trim($_POST['nim']));
        $nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
        $email         = mysqli_real_escape_string($db, trim($_POST['email']));
        $ipk           = mysqli_real_escape_string($db, trim($_POST['ipk']));
        $angkatan      = mysqli_real_escape_string($db, trim($_POST['angkatan']));
        $jurusan       = mysqli_real_escape_string($db, trim($_POST['jurusan']));
        $alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
        $no_hp         = mysqli_real_escape_string($db, trim($_POST['no_hp']));
        $nama_file     = $_FILES['foto']['name'];
        $tmp_file      = $_FILES['foto']['tmp_name'];
        // Set path folder tempat menyimpan filenya
        $path          = "foto/".$nama_file;

        // jika foto tidak diubah
        if (empty($nama_file)) {
            // perintah query untuk mengubah data pada tabel siswa
            $update = mysqli_query($db, "UPDATE tbl_siswa SET nama          = '$nama',
                                                              email         = '$email',
                                                              ipk           = '$ipk',
                                                              angkatan      = '$angkatan',
                                                              jurusan       = '$jurusan',
                                                              alamat        = '$alamat',
                                                              no_hp         = '$no_hp'
                                                        WHERE nim           = '$nim'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($db));
            // cek query
            if ($update) {
                // jika berhasil tampilkan pesan berhasil ubah data
                header("location: index.php?alert=2");
            }
        }
        // jika foto diubah
        else {
            // upload file
            if(move_uploaded_file($tmp_file, $path)) {
                // Jika file berhasil diupload, Lakukan : 
                // perintah query untuk mengubah data pada tabel siswa
                $update = mysqli_query($db, "UPDATE tbl_siswa SET nama          = '$nama',
                                                                  email         = '$email',
                                                                  ipk           = '$ipk',
                                                                  angkatan      = '$angkatan',
                                                                  jurusan       = '$jurusan',
                                                                  alamat        = '$alamat',
                                                                  no_hp         = '$no_hp',
                                                                  foto          = '$nama_file'
                                                            WHERE nim           = '$nim'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($db));
                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil ubah data
                    header("location: index.php?alert=2");
                }   
            }
        }
    }
}
// tutup koneksi
mysqli_close($db);   
?>