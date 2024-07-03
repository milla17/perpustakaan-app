<?php
//Mengirimkan Token Keamanan Ajax Request (Csrf Token)
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>online Book</title>
    
  </head>
  <body style="background-color: rgb(236, 255, 251);">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
		$(document).ready(function(){
			//Mengirimkan Token Keamanan
			$.ajaxSetup({
	            headers : {
	                'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
        
			$('#form_komen').on('submit', function(event){
				event.preventDefault();
				let nama_pengirim = $('#nama_pengirim').val();
				let komen = $('#komen').val();
				
				if(nama_pengirim==''){
				    alert("Nama Pengirim Harus disii");
				} else if(komen==''){
				    alert("Komentar Harus disii");
				} else {
    				var form_data = $(this).serialize();
    				$.ajax({
    					url:"tambah_komentar.php",
    					method:"POST",
    					data:form_data,
    					success:function(data){
    						$('#form_komen')[0].reset();
    						$('#komentar_id').val('0');
    						load_comment();
    					}, error: function(data) {
    		            	console.log(data.responseText)
    		            }
    				})
				}
			});

			load_comment();

			function load_comment(){
				$.ajax({
					url:"ambil_komentar.php",
					method:"POST",
					success:function(data){
						$('#display_comment').html(data);
					}, error: function(data) {
		            	console.log(data.responseText)
		            }
				})
			}

			$(document).on('click', '.reply', function(){
				var komentar_id = $(this).attr("id");
				$('#komentar_id').val(komentar_id);
				$('#nama_pengirim').focus();
			});
		});
	</script>
	<nav class="navbar navbar-collapse bg-primary">
	<div class="container-fluid  col-lg-10">
		<a class="navbar-brand text-light"> ONLINE BOOKS </a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
			<a href="register.php" class="btn btn-outline-light">Register</a>
        </li>
		
	</div>
	</nav>

    <section id="awal">
        <div class="container-fluid text-center">
            <h1 class="display-4 py-3"><strong>SELAMAT DATANG</strong></h1>
            <p class="lead">Ini Merupakan Aplikasi Buku Online <i>Data Buku Online</i></p>
            <hr class="my-4">
            <p>Rekomendasi buku Program Studi Sistem Informasi</p>
        </div>
    </section>

    <div class="container">
      <div class="card-putih p-5">
        <div class="row g-5">
          <div class="col-md-12">
            <article class="blog-post">		  
            <h2 class="display-5 text-center"><b>DATA BUKU</b></h2>
            <hr>
              <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table text-center" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Tahun Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php include "queryDB.php"; 
                              // mengambil data judul buku
                              $data_buku = mysqli_query($conn,"SELECT * FROM tbl_buku");
                              $no =1;
                              while ($isi = mysqli_fetch_array($data_buku)) {
                            ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$isi['isbn'];?></td>
                                    <td><?=$isi['title'];?></td>
                                    <td><?=$isi['penerbit'];?></td>
                                    <td><?=$isi['pengarang'];?></td>
                                    <td><?=$isi['thn_buku'];?></td>
                                </tr>
                            <?php $no++;}?>
                            </tbody>
                        </table>
              </div>
            </article>
          </div>
        </div>
            <div class="text-center">
                <p>Daftar sebagai anggota OnlineBook? <a href="register.php" style="color: blue;"><b>Daftar
                    Disini!</a></b></p>
            </div> 
      </div>

      <div class="container mb-3">
        <h2 align="center" style="margin: 60px 10px 10px 10px;">Komentar</h2><hr>
        <form method="POST" id="form_komen">
            <div class="form-group mb-2">
                <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Masukkan Nama" />
            </div>
            <div class="form-group mb-2">
                <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
        <hr>
        <h4 class="mb-3">Komentar :</h4>
        <span id="message"></span>
    
        <div id="display_comment"></div>
        </div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>