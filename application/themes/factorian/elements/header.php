<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">

<title>Maquette du site avec le cms</title>

 <!-- Bootstrap Core CSS -->
 <link rel="stylesheet" href="<?php echo $view->getThemePath();?>../bootstrap/css/bootstrap.min.css" >

 <!-- Theme CSS -->
<link rel="stylesheet" href="<?=$view->getThemePath();?>../css/cssGeneral.css">
<?php Loader::element('header_required'); ?>
  </head>
  <body>
  <div class="container">
    <header style="padding-top:50px;" class="container haut">
      <div class="row">
        <?php
        $a=new GlobalArea('MENU');
        $a->display($c);
        ?>              
  	  </div>
    </header>
