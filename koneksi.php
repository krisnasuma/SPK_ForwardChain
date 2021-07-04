<?php
//*hanya php versi 7 yang menggunakan fungsi "sqli"*
//buat variabel koneksi untuk mendefinisikan: nama_localhost, user_SQL, password_SQL, nama_database
$konek=mysqli_connect("localhost","root","","spforwardbasicv2",3306);
//jika mysql tidak mau terhubung, maka akan menampilkan pesan "Failed to Connect to Mysql"
if (mysqli_connect_errno()) {
    echo "Failed to Connect to Mysql: ".mysqli_connect_error();
}
?>