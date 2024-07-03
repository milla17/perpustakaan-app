<?php 
//konek database
$conn = mysqli_connect("localhost","root","","millabooks");

function query ($query){
    global $conn;
    $hasil = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($hasil)){
        $rows[] = $row;
    }
   
    return $rows;

}

function registrasi($data){
    global $conn;

    
    $nama_lengkap = $data["nama"];
    $alamat = $data["Alamat"];
    $no_telp = $data["no_telp"];
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    

    //cek apakah username sudah ada
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah dipakai, Coba username lain!');
        </script>";
        return false;
    }

    //cek konfirmasi password
   

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //insert data user ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('$id_user', '$nama_lengkap','$alamat','$no_telp','$email','$username','$password')");

    return mysqli_affected_rows($conn);
    
}