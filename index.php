<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Metode Biseksi</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        #container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        /* h2 {
            color: #007bff;
        } */

        .btn-primary {
            background-color: #17a2b8;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
		th,
        td {
            text-align: center;
        }

        .table-info th {
            background-color: #17a2b8;
            color: #ffffff;
        }
		.table-sm th,
        .table-sm td {
            padding: 8px;
        }

        
    </style>
</head>

<body>
	<div class="container" id="container">
        <h2 align="center">Metode Biseksi</h2>
        <div class="container">
            <p>Carilah akar persamaan <strong>f(x) = x<sup>2</sup>-2x-2</strong></p>
			<?php
			//----Fungsi menentukan persamaan
			function persamaan($x)
			{
				return pow($x, 2) - 2 * $x - 2;
			}
			$a		= isset($_GET['a']) ? $_GET['a'] * 1 : 0;
			$b		= isset($_GET['b']) ? $_GET['b'] * 1 : 0;
			$n		= isset($_GET['n']) ? $_GET['n'] * 1 : 0;
			//----End fungsi persamaan
			?>
			<form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="b">Batas Bawah (a)</label>
                        <input type="text" class="form-control" name="b" id="b" value="<?php echo $b; ?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="a">Batas Atas (b)</label>
                        <input type="text" class="form-control" name="a" id="a" value="<?php echo $a; ?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="n">Jumlah Iterasi</label>
                        <input type="text" class="form-control" name="n" id="n" value="<?php echo $n; ?>" />
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="button" id="button">Proses</button>
            </form>
			<?php
			$data_r = "";
			if ($n > 0) {
				$fa = persamaan($a);
				$fb = persamaan($b);
				if ($fa * $fb >= 0) {
					echo " f(a)xf(b)>0, proses dihentikan karena tidak ada akar !";
				} else {
			?>
					<table class="table table-bordered table-sm">
						<thead>
							<tr class="table-info" align="center">

								<th>Iterasi</th>
								<th>a</th>
								<th>b</th>
								<th>c</th>
								<th>f(c)</th>
								<th>f(a)</th>
								<th>f(b)</th>
								<th>Keterangan</th>
								<th>Error</th>
							</tr>
						</thead>
						<?php


						for ($k = 1; $k <= $n; $k++) {
							$x = ($a + $b) / 2;
							$fx = persamaan($x);
							$data_r .= "[" . $x . "," . $fx . "]";
							$ket = "";
							$error	= $a - $b;
							if ($fa * $fx < 0) {
								$ket = "Sama";
							} else {
								$ket = "Tanda Berlawanan";
							}
						?>
							<tr bg-color="#FFFFFF">
								<td align="center"><?php echo $k; ?></td>
								<td align="center"><?php echo number_format($b, 5, ",", "."); ?></td>
								<td align="center"><?php echo number_format($a, 5, ",", "."); ?></td>
								<td align="center"><?php echo number_format($x, 5, ",", "."); ?></td>
								<td align="center"><?php echo number_format($fx, 5, ",", "."); ?></td>
								<td align="center"><?php echo number_format($fb, 5, ",", "."); ?></td>
								<td align="center"><?php echo number_format($fa, 5, ",", "."); ?></td>
								<td align="center"><?php echo $ket; ?></td>
								<td align="center"><?php echo $error; ?></td>
							</tr>
						<?php
							if ($fa * $fx < 0) {
								$b = $x;
								$fb = $fx;
								$keterangan = "Berlawanan Tanda";
							} else {
								$a = $x;
								$fa = $fx;
								$keterangan = "Sama";
							}
							if ($k < $n) {
								$data_r .= ",";
							}
						}
						?>
					</table>
			<?php
				}
			}
			?>
		</div>
	</div>
</body>

</html>