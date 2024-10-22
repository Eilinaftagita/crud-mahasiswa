<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $nim           = mysqli_real_escape_string($db, trim($_POST['nim']));
    $nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
    $email         = mysqli_real_escape_string($db, trim($_POST['email']));
    $ipk           = mysqli_real_escape_string($db, trim($_POST['ipk']));
    $angkatan      = mysqli_real_escape_string($db, trim($_POST['angkatan']));
    $jurusan         = mysqli_real_escape_string($db, trim($_POST['jurusan']));
    $alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
    $no_hp         = mysqli_real_escape_string($db, trim($_POST['no_hp']));
    $nama_file     = $_FILES['foto']['name'];
    $tmp_file      = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $path          = "foto/".$nama_file;

    // perintah query untuk menampilkan nim dari tabel siswa berdasarkan nis dari hasil submit form
    $query = mysqli_query($db, "SELECT nim FROM tbl_siswa WHERE nim='$nim'")
                                or die('Ada kesalahan pada query tampil data nim: '.mysqli_error($db));
    $rows = mysqli_num_rows($query);
    // jika nis sudah ada
    if ($rows > 0) {
        // tampilkan pesan gagal simpan data
        header("location: index.php?alert=4&nim=$nim");
    }
    // jika nim belum ada
    else {  
        // upload file
        if(move_uploaded_file($tmp_file, $path)) {
            // Jika file berhasil diupload, Lakukan : 
            // perintah query untuk menyimpan data ke tabel siswa
            $insert = mysqli_query($db, "INSERT INTO tbl_siswa(nim,nama,email,ipk,angkatan,jurusan,alamat,no_hp,foto)
                                        VALUES('$nim','$nama','$email','$ipk','$angkatan','$jurusan','$alamat','$no_hp','$nama_file')")
                                        or die('Ada kesalahan pada query insert : '.mysqli_error($db)); 
            // cek query
            if ($insert) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: index.php?alert=1");
            }   
        }
    }
}
// tutup koneksi
mysqli_close($db);   
?>