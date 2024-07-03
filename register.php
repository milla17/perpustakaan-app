<?php 
require 'querydb.php';

if(isset($_POST["register"])){
  if(registrasi($_POST) > 0){
    echo "<script>
    alert('Registrasi Berhasil')
    document.location.href='index.php'</script>;";
  }else{
    echo mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Books</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <title>ONLINE BOOKSk</title>
      </head>
      <body>

        <!-- main -->
        <div class="container d-flex justify-content-center main-menu py-5">
          <div class="card-putih p-5 col-md-6">
            <h3 class="judul text-center fw-bold mb-4">REGISTRASI AKUN ANGGOTA</h3>
            <form action="" method="post" enctype="multipart/form-data" class="row g-3">
              <div class="col-md-12">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" />
              </div>
              <form class="row g-3">
              <div class="col-md-12">
                  <label for="Alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="Alamat" name="Alamat"/>
                </div>
                <div class="col-md-12">
                  <label for="no_telp" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp"/>
                </div>
                <div class="col-md-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email"/>
                </div>
                <div class="col-md-12">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username"/>
                </div>
                <div class="col-md-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password"/>
                </div>
                
                <div class="d-flex justify-content-center mt-4 mb-2">
                  <button type="submit" name="register" class="btn btn-primary">Daftar</button>
                </div>
                <div class="text-center">
                  <p>Tidak jadi mendaftarkan diri sebagai Anggota? <a href="index.php" style="color: blue;"><br><b>Kembali
                   ke halaman utama!</a><b></p>
              </form>
            </div>
          </div>

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>
    </html>
  </body>
</html>
