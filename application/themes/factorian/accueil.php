<?php  $view->inc('elements/header.php'); ?>
  <div class="container">
  		  <div class="row">
          <div class="col-md-12">
              <?php
              $a=new Area('diaporama');
              $a->enableGridContainer();
              $a->display($c);
              ?>
            </div>
  		  </div>
		  <div class="row">
        <div class="colone">
      			<div class="col-md-4">
              <?php
              $a=new Area('COL1');
              $a->display($c);
              ?>
      			</div>

    			<div class="col-md-4">
            <?php
            $a=new Area('COL 2');
            $a->display($c);
            ?>
    			</div>
    			<div class="col-md-4">
            <?php
            $a=new Area('COL 3');
            $a->display($c);
            ?>
    			</div>
       </div>
      </div>
		  <div class="row">
  			<div class="col-md-12 avantcontenu">
          <?php
          $a=new Area('zone Avant contenu');
          $a->enableGridContainer();
          $a->display($c);
          ?>
        </div>
		  </div>
		  <div class="row">
  			<div class="col-md-12 ">
            <?php
            $a=new Area('Contenu');
            $a->enableGridContainer();
            $a->display($c);
            ?>
  			</div>
      </div>
	</div>
<?php  $view->inc('elements/footer.php'); ?>
