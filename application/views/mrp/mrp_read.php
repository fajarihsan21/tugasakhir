<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Mrp Read</h2>
        <table class="table">
	    <tr><td>Id Bulan</td><td><?php echo $id_bulan; ?></td></tr>
	    <tr><td>Id Cm</td><td><?php echo $id_cm; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mrp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>