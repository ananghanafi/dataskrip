  <form role="form" name="form_skripsi" method="post" action="input_skripsi_process.php" enctype="multipart/form-data" autocomplete="off">

    <div class="box-body">
      <div class="row">

        <div class="col-md-12">   
          <h3 class="box-title">Data Mahasiswa</h3>        
  			  <div class="col-md-6" >
    				<div class="form-group">
    				  <label for="nama">Nama</label>
    				  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
    				</div>
    				<div class="form-group">
    				  <label for="npm">NPM</label>
    				  <input type="text" class="form-control" name="npm" placeholder="Masukkan NPM">
    				</div>
          </div>
          <div class="col-md-6" >
    				<div class="form-group">
    				  <label>Program Studi</label>
    				  <select class="form-control select2" name="prodi" style="width: 100%;">
    					<option disabled selected color="grey">Pilih Program Studi</option>
    					<?php
    					  $query = "SELECT * FROM tb_prodi";
    					  $result = mysqli_query($conn, $query);
    					  while ($row = mysqli_fetch_array($result)) {
    						  echo "<option>" . $row[1] . "</option>";
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
              <textarea type="text" class="form-control" name="judul" style="width: 100%; height: 107px;" placeholder="Masukkan Judul Skripsi"></textarea>
              <!-- <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Skripsi"> -->
            </div>
            <div class="form-group">
              <label>Tanggal Ujian</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal">
              </div>
            </div>
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Jam Ujian</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control timepicker" name="jam">
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
                  echo "<option>" . $row[1] . "</option>";
                }
                // mysqli_close($conn);
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status Ujian</label>
              <input type="text" class="form-control" name="status" placeholder="Masukkan Status Ujian">
            </div>
            <div class="form-group">
              <label for="fileUpload">Upload Foto Usulan Judul & Pembimbing</label>
              <input type="file" id="fileUpload" name="fileUpload">
              <p class="help-block">*Gambar harus berekstensi png/jpg/jpeg</p>
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
                  echo "<option>" .$row[0]." | ". $row[1] . "</option>";
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
                  echo "<option>" .$row[0]." | ". $row[1] . "</option>";
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
                  echo "<option>" .$row[0]." | ". $row[1] . "</option>";
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
                  echo "<option>" .$row[0]." | ". $row[1] . "</option>";
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
                  echo "<option>" .$row[0]." | ". $row[1] . "</option>";
                }
                mysqli_close($conn);
              ?>
              </select>
            </div>
          </div>
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
    </div>

    <div class="box-footer">
      <div class="col-md-4" >
      </div>
      <div class="col-md-4" >
        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
      </div>
      <div class="col-md-4" >
      </div>
    </div>

  </form>   
