<?php
require_once __DIR__.'/include/header.php'; 
$title='tactok';
require_once  __DIR__.'/include/head.php';
require_once  __DIR__.'/include/navbar.php';
?>
<style> 
.col-md-3{margin: auto;overflow: hidden;}
.image{
  width: 90px; height: 90px; border-radius: 50%;box-shadow: 7px 8px 10px;margin-bottom: 10px;margin: auto;
}

.hr:hover{
  width: 100%;
}
.hr{border: 5px solid orangered;width: 50px;margin: auto;transition: all .9s;}
</style>

<div class="col-md-3 card text-center  p-3">
  <img src="libs/uplaod/prof.png" class="image"s>
  <hr>
  <h1>Youssef El Haimer</h1>
  <div class="text-center">
  <hr class="hr">
  </div>
</div>


<?php
require_once __DIR__.'/include/footer.php'; 

?>
