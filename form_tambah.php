<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-edit"></i> Input Data Siswa
        </div>

        <div class="card">
            <div class="card-body">
                <!-- form tambah data siswa -->
                <form class="needs-validation" action="proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                <div class="invalid-feedback">NIM tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" required>
                                <div class="invalid-feedback">Nama siswa tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label class="mb-3">Angkatan</label>
                                <select class="form-control" name="angkatan" autocomplete="off" required>
                                    <option value=""></option>
                                    <option value="2023">2024</option>
                                    <option value="2022">2023</option>
                                    <option value="2021">2022</option>
                                    <option value="2021">2021</option>
                                </select>
                                <div class="invalid-feedback">Angkatan tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" autocomplete="off" required>
                                    <option value=""></option>
                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                    <option value="pend Bahasa Indonesia">Pend Bahasa Indonesia</option>
                                    <option value="pend Bahasa Daerah">Pend Bahasa Daerah</option>
                                </select>
                                <div class="invalid-feedback">Jurusan tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" autocomplete="off" required>
                                <div class="invalid-feedback">Email tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label>IPK</label>
                                <input type="text" class="form-control" name="ipk" autocomplete="off" required>
                                <div class="invalid-feedback">IPK tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat" autocomplete="off" required></textarea>
                                <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                <div class="invalid-feedback">No. HP tidak boleh kosong.</div>
                            </div>

                            <div class="form-group">
                                <label>Foto siswa</label>
                                <input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
                                <div id="imagePreview"><img class="foto-preview" src="foto/default.png"/></div>
                                <div class="invalid-feedback">Foto siswa tidak boleh kosong.</div>
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
