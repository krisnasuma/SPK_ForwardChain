<?php include 'koneksi.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div style="text-align: center;">
        <h1>PILIH GEJALA</h1><br>
    </div>

    <center>
    <form class="col-6" method="POST" action="prcess.php">
        <div>
        <?php
        //kueri menampilkan isi dari tabel "tb_gejala" dari database 
        $query="select * from tb_gejala_1";
        //buat variabel baru ($data) yang menampung nama variabel pada file --
        // -- koneksi.php ($konek) dan phl_gejala.php ($query)  
        $data=mysqli_query($konek,$query);

        //panggil tabel dengan perulangan while
        while ($d=mysqli_fetch_array($data)) 
        {

        ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <!--tampilkan isi kolom "id" dari tabel tb_gejala_1 menggunakan opsi opsi input-->
                    <input type="checkbox" aria-label="Checkbox for following text input" value="<?=$d['kode']?>" name="<?=$d['id']?>">
                </div>
            </div>
         <!--tampilkan isi kolom "gejala" dari tabel tb_gejala_1 menggunakan opsi input-->
         <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?=$d['gejala']?>">   

        </div>
        <?php
        }
        ?>
        </div>
        <!--opsi input submit untuk di proses oleh controller-->
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Submit">
    </form>
    </center>
</div>
<!-- /.content-wrapper -->