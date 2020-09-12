<body class="body">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#1b1b1b;position:fixed;z-index:100;width:100%">
  <a class="navbar-brand" href="<?php echo $site ?>">you<i style="color:red">mer</i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav text-right">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $site ?>"> <span class="fad fa-home"></span> home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary thisdayvideo" href="#today"> <span class="fal fa-plus"></span> new  article</a>
      </li>

     
     
     
    </ul>
      
  </div>
     <span class="navbar-text float-right" style="float:right">
      <a href="<?php echo $site ?>" class="btn btn-success">download apps</a>
    </span>
</nav>
<div>
    <br>
    </div>
    
    <div class="homes">
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
         
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">contact us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="form-group">
    <label for="exampleFormControlInput1">Email address contact</label>
    <input type="email" class="form-control"  placeholder="name@example.com" value="contact@glamourat.com" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com">
  </div>
        <div class="form-group">
    <label for="exampleFormControlTextarea1">Your text sender</label>
    <textarea class="form-control" id="texts" rows="3"></textarea>
  </div>     
           
      </div>
       
      <div class="modal-footer">
           <div class="shows" style="color:green"></div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="" class="btn btn-primary" id="sende">Send </button>
      </div>
        <script>
        $('#sende').click(function(){
            if($('#email').val()==''){
                $('.shows').text('not   send  messege!! empty  email')
            }
            else if($('#texts').val()==''){
                 $('.shows').text('not   send  messege!! empty text')
            }
            else{
               $('.shows').text('sessess send')
                })
             
            }
            
        })
        </script>
    </div>
  </div>
</div>
<!--<div class="alert alert-primary text-center">حمل الان تطبيقنا واحصل علئ جديد القيديوهات   <a href="<?php echo $site ?>/xxxx.apk">حمل الان</a></div>-->
    <div style="height: 70px;"></div>