<?php
include 'koneksi.php';
//''jika query belum lengkap dan harus memanggil dari tabel lain
//"" jika query mulai lengkap / utuh

if (isset($_POST['submit'])) 
{
    $query='select id from tb_gejala where ';
    //fungsi array_pop untuk proses POST form "submit"
    array_pop($_POST);
    $aturan_input=array();
    foreach ($_POST as $where) 
    {
        //lanjutan dari isi $query yang masih belum dilanjutkan
        $query.=$where."=1 and ";
        //array kosong mulai terisi
        array_push($aturan_input,$where);
    }

    //lanjutan dari isi $query.=$where. yang masih belum dilanjutkan
    $query.="1=1";
    $data=mysqli_query($konek,$query);
    $id='';
     //array kosong terisi
     //pastikan sudah mencocokkan aturan yang ada sesuai dengan sebaran pengetahuan yang dijabarkan pada --
     // -- Tabel Keputusan serta rule
     //pastikan sudah sesuai dengan struktur  tabel "tb_gejala" yang terdapat pada database --
     // --yang sebelumnya sudah dibuat dan dirangkum menjadi rule/aturan
    $aturan=array(
        array("G001","G002","G003","G010","G013","G020"));

    //status array ke tabel gejala jika aturan input salah/tidak cocok
    //perulangan saat status salah (kondisi boolean)   
    $status=false;

    for ($i=0; $i <1 ; $i++)
    {
        $result=($aturan_input==$aturan[$i]);
        if ($result) 
        {
            $status=true;
        }     
    }

    if ($status==true) 
    {
        while ($d=mysqli_fetch_array($data)) 
        {
            //akan di index berdasarkan id
            $id=$d['id'];
        }
        
        //setelah status sudah terpenuhi alias benar
        //hasil akan dibawa ke page / halaman baru --
        // -- berhubungan dengan "tb_penyakit".
        $cari_penyakit="select * from tb_penyakit where id=$id";
        $database=mysqli_query($konek,$cari_penyakit);
        while ($d=mysqli_fetch_array($database)) 
        {
            $penyakit=$d['penyakit'];
            $info=$d['info'];
            $solusi=$d['solusi'];
			//menuju ke page file hasil.php atau ke page kesalahan.php
            include 'hasil.php';
        }
    }else {
            include 'kesalahan.php';
    }
}
?>