  <?php  $view->inc('elements/header.php'); ?>
  <div class="container">
  	<div class="row default">
      <?php
        $a=new Area('Contenu');
        $a->enableGridContainer();
        $a->display($c);
       ?>
   </div>
  </div>
   <?php  $view->inc('elements/footer.php'); ?>
