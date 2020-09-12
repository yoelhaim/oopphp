</div>


 <!-- your script  -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"  crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>  
   
  <script src="<?php echo $site ?>/libs/js/wow.min.js"></script>
 <script src="<?php echo $site ?>/libs/js/fontewseme.js"></script>
 <script>new WOW().init();</script>



  <script>
  
    document.querySelector(".closemenu").onclick = function() {

//document.querySelector(".fa-cog").classList.toggle("fa-spin");

$(".titlelogo").toggle()
document.querySelector(".accordion").classList.toggle("open");
document.querySelector(".mainpage").classList.toggle("closemainpage");
};

document.querySelector(".closemenumobile").onclick = function() {

//document.querySelector(".fa-cog").classList.toggle("fa-spin");

$(".titlelogo").toggle()
document.querySelector(".accordion").classList.toggle("openmobile");
//document.querySelector(".mainpage").classList.toggle("closemainpage");
};
  </script>

    <!--fin  home page -->
    </body>

    </html>