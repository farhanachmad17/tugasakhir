<?php include 'koneksi.php';?>
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
        <li><a href="grafik.php?tanggal=<?php echo date('Y-m-d'); ?>" class="active">Grafik</a></li>
        <li><a href="tabel.php?tanggal=<?php echo date('Y-m-d'); ?>">Tabel</a></li>
        <li><a href="index.php">Beranda</a></li>
      </ul>

      <h2> <center>RANCANG BANGUN ANTENA MIKROSTRIP <br> UNTUK SISTEM <I>MONITORING</I> KETINGGIAN AIR SUNGAI BERBASIS <BR><I>WIRELESS SENSOR NETWORK</I> </center></h2>
      <hr>
      <form method="get" action="grafik.php">
        <h3><font face="verdana"><center> Grafik Ketinggian Muka air Sungai </h3>
        <h4><font face="verdana">Tanggal :
          <table>
            <tr> 
              <td align="left"><input type="date" value="" name="tanggal"></td>
              <td align="left"><input type="submit" value="Masukkan"/></td>
            </tr> 
          </table>
        </h4>
      </form> 
        <head>
          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
          <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
          <script type="text/javascript">
          <?php 
          if ($_GET['tanggal'] != null)
          {
            $tanggal = $_GET['tanggal'];
            $ketinggian = mysqli_query($koneksi, "SELECT * FROM ketinggian WHERE tanggal = '$tanggal'");
            $format = date('D, d F Y', strtotime($tanggal));
               echo $format;
         ?>
         <?php
           while($row = mysqli_fetch_assoc($ketinggian))
           { 
         ?>
              var chart1; 
            $(document).ready(function() {
                  chart1 = new Highcharts.Chart({
                     chart: {
                        renderTo: 'container',
                        type: 'column'
                     },   
                     title: {
                        text: 'Grafik Ketinggian Muka Air '
                     },
                     xAxis: {
                        categories: ['Waktu']
                     },
                     yAxis: {
                        title: {
                           text: 'Ketinggian Air'
                        }
                     },
                          series:             
                        [
                        <?php 
                        
                      include('koneksi.php');
                       $sql   = "SELECT *  FROM ketinggian WHERE tanggal = '$tanggal'";
                        $query = mysqli_query( $koneksi,$sql )  or die(mysqli_error());
                        while( $ret = mysqli_fetch_array( $query ) ){
                          $waktu=$ret['waktu']; 
             
                             $sql_ketinggianair   = "SELECT ketinggianair FROM ketinggian WHERE waktu='$waktu'";        
                             $query_ketinggianair = mysqli_query( $koneksi,$sql_ketinggianair ) or die(mysqli_error());
                             while( $data = mysqli_fetch_array( $query_ketinggianair ) ){
                                $ketinggianair = $data['ketinggianair'];                 
                              }             
                              ?>
                              {
                                  name: '<?php echo $waktu; ?>',
                                  data: [<?php echo $ketinggianair; ?>]
                              },
                              <?php } ?>
                        ]
                  });
               });  
          <?php  
            } } 
          ?>   
          </script>
         
        </head>
      <body>
        <div id='container'></div>    
      </body>
      <table>
      <tr> 
            <td align="left"colspan="2">Keterangan :</div></td>
          </tr>
          <tr> 
            <td align="left">SIAGA IV (Aman)</td>
            <td align="left">: < 80</div></td>
          </tr>
          <tr>
            <td align="left">SIAGA III (Waspada)</td>
            <td align="left">: 180 ~ 150</div></td>
          </tr>
          <tr>
            <td align="left">SIAGA II (Kritis)</td>
            <td align="left">: 151 ~ 220</div></td>
         </tr>
         <tr>
            <td align="left">SIAGA I (Bencana)</td>
            <td align="left">: > 220</div></td>
         </tr>
         </table>
    </div>

   <div id="footer">
      Copyright © 2019 Tugas Akhir | Achmad Farhan (1316030059) & M. Ihsaan Ramadhan (1316030100)
   </div>
  </body>

</html>
