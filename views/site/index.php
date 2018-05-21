<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}

/* @var $this yii\web\View */

$this->title = 'Sistema de Información MCEE';
?>

<div class="site-index">

    <div class="jumbotron">
        <h2>Bienvenido al sistema de información MI COMUNIDAD ES ESCUELA</h2>
        <img src="../views/site/logo_mcee.png" style="width: 100%; margin: 15px auto;">
	</div>
</div>
