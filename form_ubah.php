<?php
    // Jika tombol ubah diklik
    if (isset($_GET['nim'])) {
        // Ambil data GET dari form
        $nim = $_GET['nim'];
        
        // Perintah query untuk menampilkan data dari tabel siswa berdasarkan nim
        $query = mysqli_query($db, "SELECT * FROM tbl_siswa WHERE nim='$nim'") or die('Query Error : '.mysqli_error($db));
        $data = mysqli_fetch_assoc($query);
        
        // Buat variabel untuk menampung data
        $nim       = $data['nim'];
        $nama      = $data['nama'];
        $email     = $data['email'];
        $ipk       = $data['ipk'];
        $angkatan  = $data['angkatan'];
        $jurusan   = $data['jurusan'];
        $alamat    = $data['alamat'];
        $no_hp     = $data['no_hp'];
        $foto      = $data['foto'];
    }
    // Tutup koneksi
    mysqli_close($db);  
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i> Ubah Data Siswa
        </div>

        <div class="card">
            <div class="card-body">
                <!-- Form ubah data siswa -->
                <form class="needs-validation" action="proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $nim; ?>" readonly required>
                                <div class="invalid-feedback">NIM tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
                                <div class="invalid-feedback">Nama siswa tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="mb-3">Angkatan</label>
                                <select class="form-control" name="angkatan" autocomplete="off" required>
                                    <option value="<?php echo $angkatan; ?>"><?php echo $angkatan; ?></option>
                                    <option value="2023">2024</option>
                                    <option value="2022">2023</option>
                                    <option value="2021">2022</option>
                                    <option value="2020">2021</option>
                                </select>
                                <div class="invalid-feedback">Angkatan tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" autocomplete="off" required>
                                    <option value="<?php echo $jurusan; ?>"><?php echo $jurusan; ?></option>
                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                    <option value="pend Bahasa Indonesia">Pend Bahasa Indonesia</option>
                                    <option value="pend Bahasa Daerah">Pend Bahasa Daerah</option>
                                </select>
                                <div class="invalid-feedback">Jurusan tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $email; ?>" required>
                                <div class="invalid-feedback">Email tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>IPK</label>
                                <input type="text" class="form-control" name="ipk" autocomplete="off" value="<?php echo $ipk; ?>" required>
                                <div class="invalid-feedback">IPK tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat" autocomplete="off" required><?php echo $alamat; ?></textarea>
                                <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>No. HP</label>
                                <input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" value="<?php echo $no_hp; ?>" required>
                                <div class="invalid-feedback">No. HP tidak boleh kosong.</div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto siswa</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" value="<?php echo $foto; ?>">
                                <div id="imagePreview"><img class="foto-preview" src="foto/<?php echo $foto; ?>"/></div>
                            </div>
                        </div>
                    </div>

                    <div class="my-md-4 pt-md-1 border-top"> </div>

                    <div class="form-group col-md-12 right">
                        <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                        <a href="index.php" class="btn btn-secondary btn-reset"> Batal </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
