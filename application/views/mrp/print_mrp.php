<!iDOCTYPE html>
<html>
<head>
  <title></title> 
  <br>
      <table border=0 width="100%">
      <tr>
        <td align=center><h2>PT M</h2>
        Desa Wanaherang, Gunung Putri, Bogor 16965 – Indonesia <br></td>
        </table>
        <br>
    <hr>

    <p> Tanggal Cetak : <?php echo date('Y-m-d'); ?></p>
    <h3 align="center">LAPORAN PERENCANAAN KEBUTUHAN BAHAN BAKU PER BULAN</h3> 
</head>	
<body>

	<table>
		<tr>
			<th>No.</th>
                <th>Bulan</th>
                <th>Consumable Material</th>
                <th>Total</th>
		</tr>

		       <?php 
                                  if (isset($tahun)) {
                                      // echo $tahun;
                                      $link = $tahun."/".$bulan;
                                   ?>
                                  
                              <?php        
                                  }
                              ?>
		 <?php $no = 1;
              foreach($record as $b): ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?php echo $b->bulan ?></td>
                  <td><?php echo $b->part_name ?></td>
                  <td><?php echo $b->total ?></td>
                </tr>
            <?php endforeach; ?>

                
         
	</table>

<div align="right">
<table>
  <tr height="200">
    <td align="center"> Dicetak Oleh </td>
  </tr>
  <br>
  <tr>
    <td align="center"> Departemen PPC</td>
  </tr>
  </table>
</div>

	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>