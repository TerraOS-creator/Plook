<?php
require_once('Controller/connection.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/policy.css">
 
   <style>
   .text li{
       margin-left:2%;
       
   }
   li{
    
   }
   .text,.text li,.title h1,.subtitle h2{
       color:black;
       list-style-type:none;
   }
   .title{
       margin-left:2%;
   }
   .above{
       margin-top:1%;
   }
   .text{
       margin-left:2.5%;
   }
   hr{
       border:0.5px solid black;
   }
   nav{
       margin-bottom:2%;
   }
   </style>
  </head>
  <body>
	 
  <nav>
<div class="logo">
<a href="index.php"><img title="" src="gambar\logo2.png" style="width:200px;height:80px;"/></a>
</div>
<ul class="nav-links">
<?php if(!isset($_SESSION['user'])){ ?>
<li><a href="Login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="parallax.php">About us</a></li>
<?php }else{?> 
<li><a href="index.php">Search</a></li>
<li><a href="promo.php">Promo</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
<?php }?>
</ul>
<div class="burger">
<div  class="line1"></div>
<div  class="line2"></div>
<div  class="line3"></div>
</div>
</nav>

 <div class="title">
 <h1>Term and Conditions</h1>
 <hr >
 <div class="text">
 Syarat & ketentuan yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh PT. Plook terkait penggunaan situs Plook. Pengguna disarankan membaca dengan seksama karena dapat berdampak kepada hak dan kewajiban Pengguna di bawah hukum.
 </div>
 <br>
 <div class="text">Dengan mendaftar dan/atau menggunakan situs Plook, maka pengguna dianggap telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat & ketentuan. Syarat & ketentuan ini merupakan bentuk kesepakatan yang dituangkan dalam sebuah perjanjian yang sah antara Pengguna dengan PT.Plook. Jika pengguna tidak menyetujui salah satu, sebagian, atau seluruh isi Syarat & ketentuan, maka pengguna tidak diperkenankan menggunakan layanan di Plook.</div>
 <div class="above"></div>
 <div class="subtitle">
 <h2>A. Definisi</h2>
 <div class="text">
 1. PT Plook adalah suatu perseroan terbatas yang menjalankan kegiatan usaha jasa web portal, yakni situs pencarian berbagai kebutuhan dan jasa travelling. Selanjutnya disebut Plook.
 </div>
 <div class="text">2. Syarat & ketentuan adalah perjanjian antara Pengguna dan Plook yang berisikan seperangkat peraturan yang mengatur hak, kewajiban, tanggung jawab pengguna dan Plook, serta tata cara penggunaan sistem layanan Plook.</div>
 <div class="text">3. Pengguna adalah pihak yang menggunakan layanan Plook, termasuk namun tidak terbatas pada pembeli, penyedia barang/jasa maupun pihak lain yang sekedar berkunjung ke situs Plook.</div>
 <div class="text">4. Pembeli adalah pengguna terdaftar yang melakukan permintaan atas barang/jasa yang dijual oleh penyedia barang/jasa di situs Plook.</div>
 <div class="text">5. Penyedia barang/jasa adalah pengguna yang melakukan penawaran barang/jasa kepada Plook sehingga barang/jasa tersebut dapat dibeli oleh pembeli di situs Plook.</div>
 
 </div>
 
 <div class="above"></div>
 <div class="subtitle">
<h2> B. Transaksi Pembelian</h2>
 <div class="text">1.	Pembeli wajib bertransaksi melalui prosedur transaksi yang telah ditetapkan oleh Plook. Pembeli melakukan pembayaran dengan menggunakan metode pembayaran yang sebelumnya telah dipilih oleh Pembeli, dan kemudian Plook akan meneruskan dana ke pihak Penjual apabila tahapan transaksi jual beli pada sistem Plook telah selesai.</div>
 <div class="text">2.	Saat melakukan pembelian Barang, Pembeli menyetujui bahwa:</div>
 <div class="text">
 <li>a.	Pembeli bertanggung jawab untuk membaca, memahami, dan menyetujui informasi/deskripsi keseluruhan barang/jasa (termasuk didalamnya namun tidak terbatas pada kualitas, fungsi, dan lainnya) sebelum membuat tawaran atau komitmen untuk membeli.</li>
 <li>b.	Pengguna masuk ke dalam kontrak yang mengikat secara hukum untuk membeli barang/jasa ketika Pengguna membeli suatu barang.</li>
 <li>c.	Plook tidak mengalihkan kepemilikan secara hukum atas barang-barang dari Penjual kepada Pembeli.</li>
 </div>
 </div>

 <div class="subtitle">
 <h2>C. Komisi</h2>
 <div class="text">
 1.	Plook tidak mengenakan komisi untuk transaksi yang dilakukan melalui Situs Plook, kecuali apabila Pengguna menggunakan fitur atau layanan tertentu yang dikenakan biaya layanan.
 </div>
 <div class="text">2. Apabila dikemudian hari akan diberlakukan sistem komisi dalam transaksi melalui Situs Plook, maka akan diberitahukan kepada Pengguna yang terkena dampaknya melalui Situs Plook.</div>
 </div>
 
 <div class="subtitle">
 <h2>D. Harga</h2>
 <div class="text">
 1.	Harga Barang yang terdapat dalam situs Plook adalah harga yang ditetapkan oleh penyedia barang/jasa.</div>
 <div class="text">2.	Pembeli memahami dan menyetujui bahwa kesalahan keterangan harga dan informasi lainnya yang disebabkan tidak terbaharuinya halaman situs Plook dikarenakan browser/ISP yang dipakai Pembeli adalah tanggung jawab Pembeli.</div>
 <div class="text">3.	Situs Plook untuk saat ini hanya melayani transaksi jual beli Barang dalam mata uang Rupiah.</div>
 
 </div>

 <div class="subtitle">
 <h2>E. Kartu Kredit</h2>
 <div class="text">1.	Pengguna dapat memilih untuk mempergunakan pilihan metode pembayaran menggunakan kartu kredit untuk transaksi pembelian Barang dan produk digital melalui Situs Plook.</div>
 <div class="text">2.	Transaksi pembelian barang dengan menggunakan kartu kredit dapat dilakukan untuk transaksi pembelian dengan nilai total belanja minimal Rp. 50.000 (lima puluh ribu rupiah) hingga maksimal Rp 50.000.000 (lima puluh juta rupiah).</div>
 <div class="text">3.	Transaksi pembelian barang dengan menggunakan kartu kredit wajib mengikuti syarat dan ketentuan yang diatur oleh Plook.</div>
 <div class="text">4.	Pengguna dilarang untuk mempergunakan metode pembayaran kartu kredit di luar peruntukan sebagai alat pembayaran.</div>
 </div>
 <div class="subtitle">
 <h2>F. Promo</h2>
 <div class="text">1.	Plook sewaktu-waktu dapat mengadakan kegiatan promosi (selanjutnya disebut sebagai “Promo”) dengan Syarat dan Ketentuan yang mungkin berbeda pada masing-masing kegiatan Promo. Pengguna dihimbau untuk membaca dengan seksama Syarat dan Ketentuan Promo tersebut.</div>
 <div class="text">2.	Apabila terdapat transaksi Promo yang mempergunakan metode pembayaran kartu kredit yang melanggar Syarat dan Ketentuan Plook, maka akan merujuk pada Syarat dan Ketentuan Poin E. Kartu Kredit.</div>
 <div class="text">3.	Plook berhak, tanpa pemberitahuan sebelumnya, melakukan tindakan-tindakan yang diperlukan termasuk namun tidak terbatas pada menarik subsidi atau cashback, membatalkan benefit, pencabutan Promo, membatalkan transaksi, menutup akun, serta hal-hal lainnya jika ditemukan adanya manipulasi, pelanggaran maupun pemanfaatan Promo untuk keuntungan pribadi Pengguna, maupun indikasi kecurangan atau pelanggaran pelanggaran Syarat dan Ketentuan Plook dan ketentuan hukum yang berlaku di wilayah negara Indonesia</div>
 </div>
</div>
<div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>2020 PLOOK. All Rights Reserved</h1>
                
            </div>

            <div class="footer-items">
               <h2>QUICK LINKS</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href="index.php"><li class="footer-li">HOME</li></a>
                <a class="footer-a" href="parallax.php"><li class="footer-li">ABOUT US</li></a>
                <a class="footer-a" href="review/contactus.php"><li class="footer-li">CONTACT US</li></a>
                <?php if(isset($_SESSION['user'])) { ?>
                <a class="footer-a" href="promo.php"><li class="footer-li">PROMO</li></a>
                <?php } ?>
                
                </ul>
            </div>

            <div class="footer-items">
               <h2>Term Of Use</h2>
               <div class="border"></div>
                <ul class="footer-ul">
                <a class="footer-a" href="termandcond.php"><li class="footer-li">Term and Conditions</li></a>
                <a class="footer-a" href="privacypolicy.php"><li class="footer-li">Privacy Policy</li></a>
                <a class="footer-a" href="cookiepolicy.php"><li class="footer-li">Cookie Policy</li></a>
                
                
                </ul>
            </div>
            <div class="footer-items">
               <h2>Contact US</h2>
               <div class="border"></div>
               <ul class="footer-ul">
                    <li class="footer-li">
                    <i class="fa fa-map-marker" aria-hidden="true"> PARADISE, EARTH</i></li>
                    <li class="footer-li"><i class="fa fa-phone" aria-hidden="true"> 089778665432</i></li>
                    
                    <li class="footer-li"><i class="fa fa-envelop" aria-hidden="true"> PLOOKsupport@gmail.com</i></li>
                    
                </ul>
                <div class="social-media">
                <a class="social-media-a" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-google" aria-hidden="true"></i></a>
                <a href="" class="social-media-a"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>

            </div>

        <div class="footer-bottom">
        Copyright &copy; PLOOK 2020. ALL rights reserved.
        </div>
    </div>


  <script src="js/navbar.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>