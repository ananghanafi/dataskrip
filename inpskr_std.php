      <?php
        $id = $_SESSION['username'];
        $query = "SELECT * FROM tb_ujian_skripsi WHERE npm='".$id."'";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
          $npm = $row['npm'];
          $nama = $row['nama'];
          $prodi = $row['prodi'];

          $judul = $row["judul"];
          $tanggal = $row["tanggal"];
          $jam = $row["jam"];
          $ruang = $row["ruang"];
          $status = $row["status"];

          $nip_ketua = $row["nip_ketua"];
          $nip_sekretaris = $row["nip_sekretaris"];
          $nip_penguji1 = $row["nip_penguji1"];
          $nip_penguji2 = $row["nip_penguji2"];
          $nip_penguji3 = $row["nip_penguji3"];

          $foto_usulan = $row["foto_usulan"];
          $status_data = $row["status_data"];
        }
      ?>
      <form role="form" name="form_skripsi" method="post" action="update_skripsi_process.php?id=<?php echo $id;?>" enctype="multipart/form-data" autocomplete="off">

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php
              if ($status_data=="VALID" || $status_data=="DALAM PEMERIKSAAN") {
              ?>
              <h3 class="box-title">Status Data <?php echo $status_data;?>, Tidak Dapat Diedit</h3>
              <?php
              } else if ($status_data=="BELUM VALID"){
              ?>
              <h3 class="box-title">Status Data <?php echo $status_data;?>, Silahkan Edit Data</h3>
              <?php
              } else if ($status_data=="BARU"){
              ?>
              <h3 class="box-title">Status Data <?php echo $status_data;?>, Silahkan Input Data</h3>
              <?php
              }
              ?>
            </div>

            <div class="col-md-12">   
              <h3 class="box-title">Data Mahasiswa</h3>        
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
                </div>
                <div class="form-group">
                  <label for="npm">NPM</label>
                  <input type="text" class="form-control" name="npm" value="<?php echo $npm;?>">
                </div>
              </div>
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="prodi">Program Studi</label>
                  <!-- <input type="text" class="form-control" name="prodi" value="<?php echo $prodi;?>"> -->
                  <select class="form-control select2" name="prodi" style="width: 100%;">
                  <option disabled selected>Pilih Program Studi</option>
                  <?php
                    $query = "SELECT * FROM tb_prodi";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[1]==$prodi) {
                        echo "<option selected>" . $row[1] . "</option>";
                      } else {
                        echo "<option>" . $row[1] . "</option>";
                      }
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h3 class="box-title">Pelaksanaan Ujian Skripsi</h3>
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="judul">Judul Skripsi</label>
                  <textarea type="text" class="form-control" name="judul" style="width: 100%; height: 107px;" placeholder="Masukkan Judul Skripsi"><?php echo $judul;?></textarea>
                  <!-- <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Skripsi"> -->
                </div>
                <div class="form-group">
                  <label>Tanggal Ujian</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal" value="<?php echo $tanggal;?>">
                  </div>
                </div>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Jam Ujian</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control timepicker" name="jam" value="<?php echo $jam;?>">
                    </div>
                  <!-- /.input group -->
                  </div>
                <!-- /.form group -->
                </div>
                <div class="form-group">
                  <label>Ruang Ujian</label>
                  <select class="form-control select2" name="ruang" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Ruang Ujian</option>
                  <?php
                    $query = "SELECT * FROM tb_ruang";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[1]==$ruang) {
                        echo "<option selected>" . $row[1] . "</option>";
                      } else {
                        echo "<option>" . $row[1] . "</option>";
                      }                      
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Status Ujian</label>
                  <input type="text" class="form-control" name="status" placeholder="Masukkan Status Ujian" value="<?php echo $status;?>">
                </div>
                <div class="form-group">
                  <label for="fileUpload">Upload Foto Usulan Judul & Pembimbing</label><br>
                  <img src="<?php echo $foto_usulan;?>" name="image" alt="Gambar tidak ditemukan" height="500px" align="middle"><br><br>
                  <input type="file" id="fileUpload" name="fileUpload" value="tes">
                  <p class="help-block">*Gambar harus berekstensi png/jpg/jpeg</p>
                  <!-- <?php //echo $foto_usulan;?> -->
                </div>

              </div>
              <div class="col-md-6" >
                <div class="form-group">
                  <label>Ketua Sidang</label>
                  <select class="form-control select2" name="ketua" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Ketua Sidang</option>
                  <?php
                    $query = "SELECT * FROM tb_dosen";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[0]==$nip_ketua) {
                        echo "<option selected>" .$row[0]." | ". $row[1] . "</option>";
                      } else {
                        echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                      }
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Sekretaris</label>
                  <select class="form-control select2" name="sekretaris" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Sekretaris</option>
                  <?php
                    $query = "SELECT * FROM tb_dosen";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[0]==$nip_sekretaris) {
                        echo "<option selected>" .$row[0]." | ". $row[1] . "</option>";
                      } else {
                        echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                      }
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penguji 1</label>
                  <select class="form-control select2" name="penguji1" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Penguji 1</option>
                  <?php
                    $query = "SELECT * FROM tb_dosen";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[0]==$nip_penguji1) {
                        echo "<option selected>" .$row[0]." | ". $row[1] . "</option>";
                      } else {
                        echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                      }
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penguji 2</label>
                  <select class="form-control select2" name="penguji2" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Penguji 2</option>
                  <?php
                    $query = "SELECT * FROM tb_dosen";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[0]==$nip_penguji2) {
                        echo "<option selected>" .$row[0]." | ". $row[1] . "</option>";
                      } else {
                        echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                      }
                    }
                    // mysqli_close($conn);
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penguji 3</label>
                  <select class="form-control select2" name="penguji3" style="width: 100%;">
                  <option disabled selected color="grey">Pilih Penguji 3</option>
                  <?php
                    $query = "SELECT * FROM tb_dosen";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row[0]==$nip_penguji3) {
                        echo "<option selected>" .$row[0]." | ". $row[1] . "</option>";
                      } else {
                        echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                      }
                    }
                    mysqli_close($conn);
                  ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <div class="col-md-4" >
          </div>
          <div class="col-md-4" >
            <?php
              if ($status_data=="VALID" || $status_data=="DALAM PEMERIKSAAN") {
              ?>
              <button type="submit" class="btn btn-block btn-primary" disabled>Simpan</button>
              <?php
              } else {
              ?>
              <button type="submit" class="btn btn-block btn-primary">Simpan</button>
              <?php
              }
              ?>
          </div>
          <div class="col-md-4" >
          </div>
        </div>

      </form>   
    