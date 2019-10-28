<!DOCTYPE html>
<html>
  <head>
    <title>TA Monitoring Ketinggian Air</title>
    <link rel="stylesheet" type="text/css" href="gaya.css">
    <link rel="icon" type="image/png" href="img/logo.png">
  </head> 

  <body>
    <br>
    <div class="wrapper">
      <ul>
        <img src="img/PNJ.png" width="100px" height="100px">
        <li><a href="grafik.php?tanggal=<?php echo date('Y-m-d'); ?>">Grafik</a></li>
        <li><a href="tabel.php?tanggal=<?php echo date('Y-m-d'); ?>">Tabel</a></li>
        <li><a class="active" href="index.php">Beranda</a></li>
      </ul>

        <h2> <center>RANCANG BANGUN ANTENA MIKROSTRIP <br> UNTUK SISTEM <I>MONITORING</I> KETINGGIAN AIR SUNGAI BERBASIS <BR><I>WIRELESS SENSOR NETWORK</I> </center></h2>

        <hr>
    
        <h3><font face="verdana"><center> Infomasi Ketinggian Muka Air </h3>
        <h4><p align="justify"> Banjir merupakan kejadian alam yang dapat terjadi setiap saat dan sering mengakibatkan kerugian jiwa, harta dan benda. Kejadian banjir tidak dapat dicegah, namun hanya dapat dikendalikan dan dikurangi dampak kerugian yang diakibatkannya. Pemberitahuan ketinggian air pada  sungai sangat dibutuhkan untuk memperingatkan masyarakat secara dini. Dibuatlah sistem monitoring ketinggian air, dilakukan dengan merancang perangkat Wireless Sensor Network (WSN) dimana perangkat akan mengukur ketinggian permukaan air dengan menggunakan Sensor Hc-sr04, kemudian data hasil pengukuran diolah oleh unit Arduino uno sehingga menghasilkan jarak, selanjutnya data dikirim ke web server. Pada tugas akhir ini menggunakan modul nrf24l01 2,4 GHz dengan antenna mikrostrip patch disc scector array 2x2 sebagai transmitter dan antena mikrostrip fractal meanline sebagai receiver. Kemudian data ketinggian air disajikan pada Website sistem monitoring secara real time</h4></p>
    </div>
    
    <div id="footer">
      Copyright © 2019 Tugas Akhir | Achmad Farhan (1316030059) & M. Ihsaan Ramadhan (1316030100)
    </div>

  </body>
 
</html>

