<?php include 'koneksi.php';?>

<!DOCTYPE html>
<html>
  <head>
    <title>TA Monitoring Ketinggian Air</title>
    <link rel="stylesheet" type="text/css" href="gaya.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <!--<meta http-equiv = "refresh" content="1"/>-->
  </head> 
  
  <body>
    <br>
    <div id="countainer">
      <div class="wrapper">
        <ul>
          <img src="img/PNJ.png" width="100px" height="100px">
          <li><a href="grafik.php?tanggal=<?php echo date('Y-m-d'); ?>">Grafik</a></li>
          <li><a href="tabel.php?tanggal=<?php echo date('Y-m-d'); ?>" class="active">Tabel</a></li>
          <li><a href="index.php">Beranda</a></li>
        </ul>

        <h2> <center>RANCANG BANGUN ANTENA MIKROSTRIP <br> UNTUK SISTEM <I>MONITORING</I> KETINGGIAN AIR SUNGAI BERBASIS <br><I>WIRELESS SENSOR NETWORK</I> </center></h2>
        <hr>
        <form method="get" action="tabel.php">
          <h3><font face="verdana"><center> Tabel Ketinggian Muka Air Sungai </center></h3>
          <h4><font face="verdana">Tanggal : 
            <br>
            <table>
              <tr> 
                <td align="left"><input type="date" value="" name="tanggal"></td>
                <td align="left"><input type="submit" value="Masukkan"></td>
              </tr> 
            </table>
          </h4>
        </form>
        <?php 
          if ($_GET['tanggal'] != null)
          {
            $tanggal = $_GET['tanggal'];
            $format = date('D, d F Y', strtotime($tanggal));
              echo $format;
            $ketinggian = mysqli_query($koneksi, "SELECT * FROM ketinggian WHERE tanggal = '$tanggal'");
         ?>
         <br>

         <table border="1" align="center">
          <tr>
            <td class="kiri" rowspan="2" >Waktu</td>
            <td class="kiri" colspan="4" >Batas Siaga</td>
            <td class="kiri" rowspan="2" >Ketinggian Air</td>
            <td class="kiri" rowspan="2" >Status</td>
          </tr>
          <tr>
            <td class="kiri">Siaga IV</td>
            <td class="kiri">Siaga III</td>
            <td class="kiri">Siaga II</td>
            <td class="kiri">Siaga I</td>
          </tr>
        
         <?php
           while($row = mysqli_fetch_assoc($ketinggian))
           { 
         ?>

            <tr>
              <td class="kanan"><?php echo $row['waktu']; ?></td>
              <td class="kanan">< 80</td>
              <td class="kanan">80 ~ 150</td>
              <td class="kanan">151 ~ 220</td>
              <td class="kanan">> 220</td>
              <td class="kanan"><?php echo $row['ketinggianair']; ?> </td>
              <td Class="kanan"> 
                <?php 
                  if ($row['ketinggianair'] < '80'){
                    echo '<div class="circle1"></div>'; 
                  } 
                  elseif ($row['ketinggianair'] >= '80' && $row['ketinggianair'] <='150'){
                    echo '<div class="circle2"></div>';
                  }
                  elseif ($row['ketinggianair'] > '151' && $row['ketinggianair'] <= '220'){
                    echo '<div class="circle3"></div>';
                  }
                  elseif ($row['ketinggianair'] > '220'){
                    echo '<div class="circle4"></div>';
                  }
                ?> 
              </td> 
            </tr>
          <?php  
            } } 
          ?> 
        </table>

        <br><hr>
        
        <table align="left" border=0
        > 
          <tr> 
            <td align="left"colspan="2">Keterangan :</div></td>
          </tr>
          <tr> 
            <td align="left"><div class="circle1"></div></td>
            <td align="left">SIAGA IV (Aman)</td>
          </tr>
          <tr>
            <td align="left"><div class="circle2"></div></td>
            <td align="left">SIAGA III (Waspada)</td>
          </tr>
          <tr>
            <td align="left"><div class="circle3"></div></td>
            <td align="left">SIAGA II (Kritis)</td>
         </tr>
         <tr>
            <td align="left"><div class="circle4"></div></td>
            <td align="left">SIAGA I (Bencana)</td>
         </tr>
         </table>
         <br><br><br><br><br><br><br>
      </div>
    </div>

    <div id="footer">
      Copyright © 2019 Tugas Akhir | Achmad Farhan (1316030059) & M. Ihsaan Ramadhan (1316030100)
    </div>

  </body>

</html>
