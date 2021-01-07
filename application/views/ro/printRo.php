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
    <h3 align="center">Release Order</h3> 
</head>	
<body>

	<table>
		<tr>
			<th>No.</th>
                <th>Periode</th>
                <th>Part Number</th>
                <th>Consumable Material</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Supplier</th>
                <th>Total Harga</th>
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
                  <td><?php echo $b->periode ?></td>
                  <td><?php echo $b->part_number ?></td>
                  <td><?php echo $b->part_name ?></td>
                  <td><?php echo $b->total ?></td>
                  <td><?php echo $b->harga ?></td>
                  <td><?php echo $b->nama_sup ?></td>
                  <td><?php echo $b->total_harga ?></td>
                </tr>
            <?php endforeach; ?>

                
         
	</table>

<div align="left">
<table>
  <tr height="200">
   <td align="left"> Dicetak Oleh </td> 
   <td align="right"> Disetujui Oleh </td>
  </tr>
  <br>
  <tr>
    <td align="left"> Departemen PPC</td>
    <td align="right"> Supplier</td>
  </tr>
  </table>
</div>

	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>