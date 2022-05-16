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
   .subtitle li{
    margin-left:4%;
   }
   li .subtitle{
       margin-top:0.75%;
   }
   .subtitle .indent{
       margin-left:6%;
   }
   li{
    list-style-type:none;
   }
   .text,.text li,.title h1,.subtitle h2{
       color:black;
       list-style-type:none;
   }
   .subtitle{
       color:black;
   }
   .subtitle h2{
       margin-top:1%;
   }
   .title{
       margin-left:3%;
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
 <h1>Privacy Policy</h1>
 <hr >
 <div class="text">
 Adanya Kebijakan Privasi ini adalah komitmen nyata dari Plook untuk menghargai dan melindungi setiap data atau informasi pribadi Pengguna situs Plook.</div>
 <br>
 <div class="text">Kebijakan Privasi ini (beserta syarat-syarat penggunaan dari situs Plook sebagaimana tercantum dalam "Syarat & Ketentuan" dan informasi lain yang tercantum di Situs) menetapkan dasar atas perolehan, pengumpulan, pengolahan, penganalisisan, penampilan, pembukaan, dan/atau segala bentuk pengelolaan yang terkait dengan data atau informasi yang Pengguna berikan kepada Plook atau yang Plook kumpulkan dari Pengguna, termasuk data pribadi Pengguna, baik pada saat Pengguna melakukan pendaftaran di Situs, mengakses Situs, maupun mempergunakan layanan-layanan pada Situs (selanjutnya disebut sebagai "data").</div>
 <br>
 <div class="text">Dengan mengakses dan/atau mempergunakan layanan Plook, Pengguna menyatakan bahwa setiap data Pengguna merupakan data yang benar dan sah, serta Pengguna memberikan persetujuan kepada Plook untuk memperoleh, mengumpulkan, menyimpan, mengelola dan mempergunakan data tersebut sebagaimana tercantum dalam Kebijakan Privasi maupun Syarat dan Ketentuan Plook.</div>

 <div class="above"></div>
 <div class="subtitle">
 <h2>A. Perolehan dan Pengumpulan Data Pengguna</h2>
 <div class="text">
 Plook mengumpulkan data Pengguna dengan tujuan untuk memproses transaksi Pengguna, mengelola dan memperlancar proses penggunaan Situs, serta tujuan-tujuan lainnya selama diizinkan oleh peraturan perundang-undangan yang berlaku. Adapun data Pengguna yang dikumpulkan adalah sebagai berikut:
 </div>
 <li><div class="subtitle">1.	Data yang diserahkan secara mandiri oleh Pengguna, termasuk namun tidak terbatas pada data yang diserahkan pada saat Pengguna:</div>
    <li class="indent">a.	Membuat atau memperbarui akun Plook, termasuk diantaranya nama pengguna (username), alamat email, nomor telepon, password, alamat, foto, dan lain-lain;</li>
    <li class="indent">b.	Menghubungi Plook, termasuk melalui layanan konsumen;</li>
    <li class="indent">c.	Mengisi survei yang dikirimkan oleh Plook atau atas nama Plook;</li>
    <li class="indent">d.	Mempergunakan layanan-layanan pada Situs, termasuk data transaksi yang detil, diantaranya jenis, jumlah dan/atau keterangan dari produk atau layanan yang dibeli, kanal pembayaran yang digunakan, jumlah transaksi, tanggal dan waktu transaksi, serta detil transaksi lainnya;</li>
    <li class="indent">e.	Mengisi data-data pembayaran pada saat Pengguna melakukan aktivitas transaksi pembayaran melalui Situs, termasuk namun tidak terbatas pada data rekening bank, kartu kredit, virtual account, instant payment, internet banking, gerai ritel; dan/atau menggunakan fitur yang membutuhkan izin akses terhadap perangkat Pengguna.
</li>
 </li>
 <li><div class="subtitle">2.	Data yang terekam pada saat Pengguna mempergunakan Situs, termasuk namun tidak terbatas pada:</div>
    <li class="indent">a.	Data lokasi riil atau perkiraannya seperti alamat IP, lokasi Wi-Fi, geo-location, dan sebagainya;</li>
    <li class="indent">b.	Data berupa waktu dari setiap aktivitas Pengguna, termasuk aktivitas pendaftaran, login, transaksi, dan lain sebagainya;</li>
    <li class="indent">c.	Data penggunaan atau preferensi Pengguna, diantaranya interaksi Pengguna dalam menggunakan Situs, pilihan yang disimpan, serta pengaturan yang dipilih. Data tersebut diperoleh menggunakan cookies, pixel tags, dan teknologi serupa yang menciptakan dan mempertahankan pengenal unik;</li>
    <li class="indent">d.	Data perangkat, diantaranya jenis perangkat yang digunakan untuk mengakses Situs, termasuk model perangkat keras, sistem operasi dan versinya, perangkat lunak, nomor IMEI, nama file dan versinya, pilihan bahasa, pengenal perangkat unik, pengenal iklan, nomor seri, informasi gerakan perangkat, dan/atau informasi jaringan seluler;</li>
    <li class="indent">e.	Data catatan (log), diantaranya catatan pada server yang menerima data seperti alamat IP perangkat, tanggal dan waktu akses, fitur aplikasi atau laman yang dilihat, proses kerja aplikasi dan aktivitas sistem lainnya, jenis peramban, dan/atau situs atau layanan pihak ketiga yang Anda gunakan sebelum berinteraksi dengan Situs.
</li>
 </li>
 <li><div class="subtitle">3.	Data yang diperoleh dari sumber lain, termasuk:</div>
    <li class="indent">a.	Mitra usaha Plook yang turut membantu Plook dalam mengembangkan dan menyajikan layanan-layanan dalam Situs kepada Pengguna, antara lain mitra penyedia layanan pembayaran, infrastruktur situs, dan mitra-mitra lainnya.</li>
    <li class="indent">b.	Mitra usaha Plook tempat Pengguna membuat atau mengakses akun Plook, seperti layanan media sosial, atau situs/aplikasi yang menggunakan API Plook atau yang digunakan Plook.</li>
    <li class="indent">c.	Penyedia layanan finansial, termasuk namun tidak terbatas pada lembaga atau biru pemeringkat kredit atau Lembaga Pengelola Informasi Perkreditan (LPIP);</li>
    <li class="indent">d.	Penyedia layanan pemasaran;</li>
    <li class="indent">e.	Sumber yang tersedia secara umum.</li>
<li><div class="subtitle">Plook dapat menggabungkan data yang diperoleh dari sumber tersebut dengan data lain yang dimilikinya.</div></li>
 </li>

</div>
<div class="subtitle">
 <h2>B. Penggunaan Data</h2>
 <div class="text">Plook dapat menggunakan keseluruhan atau sebagian data yang diperoleh dan dikumpulkan dari Pengguna sebagaimana disebutkan dalam bagian sebelumnya untuk hal-hal sebagai berikut: </div>
 <li>1.	Memproses segala bentuk permintaan, aktivitas maupun transaksi yang dilakukan oleh Pengguna melalui Situs.</li>
 <li>2.	Penyediaan fitur-fitur untuk memberikan, mewujudkan, memelihara dan memperbaiki produk dan layanan kami, termasuk:</li>
 <li class="indent">a.	Menawarkan, memperoleh, menyediakan, atau memfasilitasi layanan melalui Situs;</li>
 <li class="indent">b.	Melakukan kegiatan internal yang diperlukan untuk menyediakan layanan pada situs/aplikasi Plook, seperti pemecahan masalah software, bug, permasalahan operasional, melakukan analisis data, pengujian, dan penelitian, dan untuk memantau dan menganalisis kecenderungan penggunaan dan aktivitas.</li>
 </div>
 <div class="subtitle">
 <h2>C. Pengungkapan Data Pribadi Pengguna</h2>
 <div class="text">Plook menjamin tidak ada penjualan, pengalihan, distribusi atau meminjamkan data pribadi Anda kepada pihak ketiga lain, tanpa terdapat izin dari Anda, kecuali dalam hal-hal sebagai berikut:</div>
 <li>a.	Dibutuhkan adanya pengungkapan data Pengguna kepada mitra atau pihak ketiga lain yang membantu Plook dalam menyajikan layanan pada Situs dan memproses segala bentuk aktivitas Pengguna dalam Situs, termasuk memproses transaksi, verifikasi pembayaran, pengiriman produk, dan lain-lain.</li>
 <li>b.	Plook dapat menyediakan informasi yang relevan kepada mitra usaha sesuai dengan persetujuan Pengguna untuk menggunakan layanan mitra usaha, termasuk diantaranya aplikasi atau situs lain yang telah saling mengintegrasikan API atau layanannya, atau mitra usaha yang mana Plook telah bekerjasama untuk mengantarkan promosi, kontes, atau layanan yang dikhususkan</li>
 <li>c.	Dibutuhkan adanya komunikasi antara mitra usaha Plook (seperti pembayaran, dan lain-lain) dengan Pengguna dalam hal penyelesaian kendala maupun hal-hal lainnya.</li>
 <li>d.	Plook dapat menyediakan informasi yang relevan kepada vendor, konsultan, mitra pemasaran, firma riset, atau penyedia layanan sejenis.</li>
 <li>e.	Pengguna menghubungi Plook melalui media publik seperti blog, media sosial, dan fitur tertentu pada Situs, komunikasi antara Pengguna dan Plook mungkin dapat dilihat secara publik.</li>
 <li>f.	Plook dapat membagikan informasi Pengguna kepada anak perusahaan dan afiliasinya untuk membantu memberikan layanan atau melakukan pengolahan data untuk dan atas nama Plook.</li>
 <li>g.	Plook dapat membagikan data atau informasi Pengguna yang diperlukan dalam rangka kelayakan kredit kepada lembaga atau biro pemeringkat kredit atau Lembaga Pengelola Informasi Perkreditan (LPIP).</li>
 <li>h.	Plook mengungkapkan data Pengguna dalam upaya mematuhi kewajiban hukum dan/atau adanya permintaan yang sah dari aparat penegak hukum.</li>
 </div>
</div>
<div class="footer">
        <div class="inner-footer">
            <div class="footer-items">
                <h1>2022 PLOOK. All Rights Reserved</h1>
               
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
        Copyright &copy; PLOOK 2022. ALL rights reserved.
        </div>
    </div>


  <script src="js/navbar.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>