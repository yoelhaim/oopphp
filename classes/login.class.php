<?php

class login extends mysqlconn{
    private $email , $password ;
    
    public function setInput($email , $password){
        $this->email = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
       
    }
    
    public function DisplayError(){
        if(empty($this->email)){
            echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>خطا!</strong>emqil empty
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }else if(empty ($this->password)){
            echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>خطا!</strong>  password empty.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            
        }else if(!$this->checkUser()){
           echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>خطا!</strong> email or password not correct.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
        else{
           if($this->checkUser()){
            $this->query('*', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->password'");
            $this->execute();
           // $user = $this->fetch();
            while( $row = $this->fetch()) {
            $_SESSION['is_logged'] = true;
                 $_SESSION['id'] = $row['id'];
                //   $_SESSION['username'] = $row['username'];
                   $_SESSION['email'] = $row['email'];
                //   $_SESSION['date'] = $row['date'];
                //   $_SESSION['phone'] = $row['phone'];
                
                   $_SESSION['password'] = $row['password'];
                 
                if($_SESSION['id'] ==1){
                echo "<script type='text/javascript'>window.location.href = ''</script>";
             exit();
            }  else {
                 
             echo "<script type='text/javascript'>window.location.href = ''</script>";
             exit();
            }
        }
        
             }else{
                 echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
  <strong>خطا!</strong> غير متوقع.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
             }
       
    
        }
        // echo 'nnnddd';
    }
    
    private function checkUser(){
        $this->query('id', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->password'");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }  else {
            return FALSE;
            
        }
       
    }
    
  
    
}

