<?php

 // $this->registerJsFile(Yii::$app->request->baseUrl.'/js/sweetalert2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
 	
	
	// $warning = "success";
	// $message = "mensaje de prueba";
	
	// $this->registerJs( <<< EOT_JS_CODE

  // swal({
  // title: '<i>HTML</i> <u>example</u>',
  // type: 'info',
  // html:
    // 'You can use <b>bold text</b>, ' +
    // '<a href="//github.com">links</a> ' +
    // 'and other HTML tags',
  // showCloseButton: true,
  // showCancelButton: true,
  // focusConfirm: false,
  // confirmButtonText:
    // '<i class="fa fa-thumbs-up"></i> Great!',
  // confirmButtonAriaLabel: 'Thumbs up, great!',
  // cancelButtonText:
  // '<i class="fa fa-thumbs-down"></i>',
  // cancelButtonAriaLabel: 'Thumbs down',
// })

// EOT_JS_CODE
// );



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
