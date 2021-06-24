<?php 
require('conexion.php');
//require($_SERVER['DOCUMENT_ROOT'].'/ajax/mailreto.php');
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION)) { session_start(); } 



function usuarios($conn) {

	$sql = "SELECT *  FROM usuario WHERE correo NOT IN (
	'yefer.cote@hotmail.com',
	'paola_cen044@hotmail.com',
	'jokibay@yahoo.com',
	'administrativo@clinicaelpinar.co',
	'doctorbayter@gmail.com',
	'hello@jeffcote.me',
	'jackie@adn-empresarial.com',
	'dianarod.can@gmail.com',
	'aberruncio@gmail.com',
	'cecibracho@gmail.com',
	'ancuta_stancioiu@yahoo.com',
	'claudiacarlomagno@gmail.com',
	'shanis18@gmail.com',
	'carrizalcity1978@gmail.com',
	'osvaldodebritos@hotmail.com',
	'edithmarcozzi75@gmail.com',
	'tata_0825@hotmail.com',
	'netcelaya@gmail.com',
	'sandra.bustamante.v@gmail.com',
	'm.bgariella28@gmail.com',
	'marthaczielke@gmail.com',
	'virginialop27@gmail.com',
	'fanin123@yahoo.com',
	'anavictoriapaz17@gmail.com',
	'alondrama18@gmail.com',
	'giseladiaz201560@gmail.com',
	'saraifayad@hotmail.com',
	'cintyamorales93@gmail.com',
	'cococruz2308@hotmail.com',
	'chocasorulla@yahoo.com',
	'rherna73@gmail.com',
	'rosah71@gmail.com',
	'roswell_ufo_center@hotmail.com',
	'luciainesmondragon@gmail.com',
	'ru.b.yorozco@hotmail.com',
	'valleptomotions@gmail.com',
	'cata.carci16@gmail.com') AND estado = 1 LIMIT 10000";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) >= 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$clientes[] = $row;
		}
	}
	
	foreach ($clientes as $cliente) {
		
		$sql = "SELECT * FROM usuario_fase WHERE id_usuario = ".$cliente['id_usuario'];
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)) {

				$name = strtolower($cliente['nombre']). " ".strtolower($cliente['apellido']);

				echo " %user = User::create([";
				echo " 'name' => '".ucwords($name)."',";
				echo " 'email' => '".strtolower($cliente['correo'])."',";
				echo " 'password' => bcrypt('01020304')";
				echo "]);";
				echo "<br>";

				echo "%suscription = new Subscription();";
				echo "<br>";
				echo "%suscription->user_id =". $cliente['id_usuario'].";";
				echo "<br>";
				echo "%suscription->plan_id = 2;";
				echo "<br>";
				echo "%suscription->save();";
				echo "<br>";
            	echo "%fase = Fase::find(1);";
				echo "<br>";
				echo "%fase->clients()->attach(%user->id);";
				echo "<br>";
				echo "<br>";
				
			}
		}
		
	}


}

usuarios($conn); 
	
