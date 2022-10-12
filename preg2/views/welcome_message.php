<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		* {
			box-sizing: border-box;
			padding: 0;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}
		a ,
		a:visited{
			text-decoration: none;
			color: black;
		}
		body {
			width: 100vw;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			background: #a18cd1;
			/* Chrome 10-25, Safari 5.1-6 */
			background: -webkit-linear-gradient(to right, rgba(161, 140, 209, 0.5), rgba(251, 194, 235, 0.5));

			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background: linear-gradient(to right, rgba(161, 140, 209, 0.5), rgba(251, 194, 235, 0.5));
		}
		.main-title,
		.main-subtitle
		{
			text-align: center;
			margin: 0.5rem 1rem;
		}
		.menu {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 1rem;
		}
		.container{
			width: 17rem;
			height: 13rem;
			transition: .3s ease-in-out;
			background: rgba(255, 255, 255, 0.2);
			border-radius: 16px;
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			border: 1px solid rgba(255, 255, 255, 0.3);
		}
		.container:hover {
			transform: rotateY(15deg);
			box-shadow: -15px 0px 15px rgba(0, 0, 0, 0.1); 
		}
		.card {
			width: 100%;
			height: 100%;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		.title {
			width: 100%;
			color: #333333;
			text-align: center;
		}
		.card img {
			margin: .5rem 0;
			width: 60%;
			height: 60%;
			/* background-color: aqua; */
			border-radius: 10px;
		}
		.btn {
			width: 17rem;
			height: 3rem;
			transition: .3s ease-in-out;
			display: flex;
			justify-content: center;
			align-items: center;
			background: rgba(255, 255, 255, 0.2);
			border-radius: 16px;
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			border: 1px solid rgba(255, 255, 255, 0.3);
		}
		.btn:hover {
			transform: rotateY(15deg);
			box-shadow: -15px 0px 15px rgba(0, 0, 0, 0.1); 
		}
		@media (max-width: 425px) {
			body {
				height: 170vh;
			}
			.menu {
				grid-template-columns: 1fr;
			}
		}
	</style>
</head>
<body>
	<h2 class="main-title">Facultad de Ciencias Puras y Naturales</h2>
    <h4 class="main-subtitle">Menu Principal</h4>
    <div class="menu">
        <?php 
			$nombres = array("Informática", "Matemática", "Química", "Física");
			// $links = array("http://www.informatica.edu.bo/", "http://cmat.umsa.bo/", "http://cienciasquimicas.umsa.bo/", "http://www.fiumsa.edu.bo/");
			$links = array("index.php/inf", "index.php/mat", "index.php/qmc", "index.php/fis");
			$images = array(
				"https://scontent.flpb2-2.fna.fbcdn.net/v/t39.30808-6/309318509_164362356257433_1883870741296238784_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=S4CjxH1C1NUAX9igPUg&_nc_oc=AQkMPb0HFVugil0oWPz_o_gUNa4Vx-OaIxTE3Ox0g9-tsjVZQhN61hoTX8AyR7Fg4j4&_nc_ht=scontent.flpb2-2.fna&oh=00_AT_lLXf2SWjBUSgXq3njYtokOj74MDGcwHC2q21sDX8fOw&oe=63488F7E", 
				"data:image/png;base64,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", 
				"https://cvcienciasquimicas.umsa.bo/pluginfile.php/3777/block_html/content/LOGOcsquimicas.png", 
				"data:image/jpeg;base64,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"
				);
            for ($i=0; $i < count($nombres); $i++) { 
                echo "<div class='container'>";
                echo    "<a href='$links[$i]' class='card'>";
                echo        "<h3 class='title'>Carrera de $nombres[$i]</h3>";
                echo        "<img src='$images[$i]' alt='Logo carrera $nombres[$i]'>";
                echo    "</a>";
                echo "</div>";
            }
        ?>
    </div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</body>
</html>
