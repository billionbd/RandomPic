<?php
$base_url='https://billionbd.github.io/randompix';
$files = glob('images/*');
if ($files) {
    $PIX_NUM = count($files);

    if (!isset($_GET['i'])) {
        $random_pix_index = rand(1, $PIX_NUM);
    } else if (ctype_digit($_GET['i'])) {
        $random_pix_index = $_GET['i'];
    }
} else {
    $PIX_NUM = 0;
    $random_pix_index = 0;
}
?>

<html>
<head>
    <title>RandomPix</title>
    <meta charset="utf-8">
    <meta type="author" content="billionbd" />
    <meta type="description" content="Displaying pictures of random pictures with every click!" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#FF6600" />
	<meta http-equiv="Cache-Control" content="max-age=1" />

    <meta property="og:image" content="<?= $base_url ?>/images/<?= $random_pix_index ?>.jpg" />
    <meta property="og:title" content="randompix" />
    <meta property="og:description" content="Random picture on every click!" />
    <meta property="og:url" content="<?= $base_url ?>" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function () {
            var panel_width = document.getElementById('sidebar').offsetWidth;
            var image_width = document.getElementById('pix_full_link').offsetWidth;
            document.getElementById('footer').style.width = panel_width + image_width;
        });
    </script>

    <style type="text/css">
        body {
            margin: 0;
			padding: 5px;
            font-family: arial, verdana, tahoma, sans-serif;
            font-size: 14px;
        }
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 75%;
            text-align: center;
        }
		#panel {
			display: flex;
			align-items: center;
			max-height: 100%;
		}
        #sidebar {
            float: left;
            width: 200px;
            padding: 5px;
        }
		#pix_full_link {
			max-width: calc(100% - 240px);
			max-height: 100%;
            background: transparent url('<?= $base_url ?>/images/<?= $random_pix_index ?>.jpg') 0 0/contain no-repeat;
			margin: 10px;
		}
        #pix_img_link {
            float: left;
            margin: 10px;
			max-width: 100%;
            border: 2px solid #ccc;
        }
    </style>
</head>
<body>
<div id="panel">
	<div id="sidebar">
		<label for=shareButton><strong>Share this pix!</strong></label>
		<input type="text" id="shareButton" value="<?= $base_url ?>/?i=<?= $random_pix_index ?>" onclick="this.select();" /><br />

		<p id="pix_count">Pic Count: <?= $PIX_NUM ?><br />
			<a href="https://github.com/billionbd/randompic">Add more Picture!</a></p>

		<p>Submit more pic?<br>Here: <a href="https://github.com/billionbd/randompic" target="_blank">GitHub</a> or <a href="mailto:billionbd@gmail.com?subject=Fox%20Pictures%20Upload%20Request&body=abc">Email</a></p>

		<br /><br /><br />
		<p>API is Available: <a href="<?= $base_url ?>/api"><?= $base_url ?>/api</a></p>

	</div>

	<a href="<?= $base_url ?>/?i=<?= $random_pix_index ?>" id="pix_full_link">
		<img src="<?= $base_url ?>/images/<?= $random_pix_index ?>.jpg" alt="" title="" style="visibility: hidden;" id="pix_img_link" />
	</a>

    <div id="footer">
        <p>Made by: billionbd</p>
    </div>
</div>

</body>
</html>
