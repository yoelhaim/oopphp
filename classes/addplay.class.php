<?php

class addplay extends mysqlconn{
    protected $title,$links,$live;
    public function  Videoadd($title,$linked){
       
        $this->title= $this->esc($this->html($title));
		$this->lien = $this-> html($this->esc($linked));
        $this->time = time();
        $this->date = date("d.m.Y");
        //$this->links = substr(trim(strip_tags($links)),32,10000);
        $link = $this->lien;
        $val = explode("v=", $link);
        $this->links = substr(@$val[1],0,11);
        
        if (empty($this->links)){
           $val = explode("be/", $link);
           $this->links = substr(@$val[1],0,11);

        }
         else if(empty($this->title)){
 messages::setMsg('error!!','خطأ  العنوان فارغ','danger');
            echo messages::getMsg();
        }
        elseif(empty($this->links)){
            messages::setMsg('error!!','the link youtube is emoty or not support try again','danger');
            echo messages::getMsg();
        }
        else{
            $this->insert('vid',"`title`, `link`, `img`, `time`, `date`, `vue`, `visible`","'$this->title','$this->links','$this->links','$this->time','$this->date',0,1");
			if($this->execute()){
				
                messages::setMsg('secceful!!','تم الإضافة بنجاح','success animate bonceIn');
                echo messages::getMsg();
				
			}else{
                messages::setMsg('no!!','خطأ لم يتم الإضافة ','warning animate wobble');
                echo messages::getMsg();
            }
        }
         
       
}

     public function addcom($id,$name,$com){
        $this->name= $this->esc($this->html($name));
        $this->com= $this->esc($this->html($com));
        $this->time = time();
        $this->date = date("d.m.Y");
        if(empty($this->name)){
            echo 0;

        }elseif(empty($com)){
      echo 0;
        }else{
            $this->insert('cmnt',"`txt`, `post_vid`, `date_com`, `time_com`, `name_user`","'$this->com','$id','$this->date','$this->time','$this->name'");
            if($this->execute()){
                $this->query('rowcmnt','vid' , "WHERE `id_post` = '{$id}'");
                if($this->execute() and $this->rowCount() > 0){
                    $vue = $this->fetch();
                    $num = $vue['rowcmnt']+1;
                    
                    $this->update('vid',"`rowcmnt` ='$num'",'id_post', $id);
                    $this->execute();
                    echo "seccefully";
                }
              
            }else{
                echo 0;
            }
        }

     }
   public function showpost($other = null){
        $this->query('*', 'vid',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    } 
    public function cmnt($other = null){
        $this->query('*', 'cmnt',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    } 

    

    public function article($other = null){
        $this->query('*', 'vid',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
	
    public function viewwhatsapp($id){
       $id =$id;
        $this->query('id_post', 'vid', "WHERE `id_post` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $id = $this->fetch();
		
            return $id['id_post'];
			
            
        }else{
           
           include('404.php');
			die();
        }
    }
	 public function updatev($id){
	   $this->query('vue','vid' , "WHERE `id_post` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $vue = $this->fetch();
			$num = $vue['vue']+1;
			
			$this->update('vid',"`vue` ='$num'",'id_post', $id);
			$this->execute();
        }
}
    public function updates($title,$lien,$id,$link)
    {
        $this->links = substr(trim(strip_tags($lien)),32,10000);
        $val = explode("v=", $lien );
         $this->links = substr(@$val[1],0,11);

        if(empty($title) || empty($this->links))
        {
             messages::setMsg('no!!','empty link or title','danger');
            echo messages::getMsg();
        }else
        {
              $this->update('vid',"title ='$title',link = '$this->links',img = '$this->links'",'id_post',$id);
        if($this->execute())
        {

//             $url="https://i.ytimg.com/vi/$lien/hqdefault.jpg";
//  $data = file_get_contents($url);
//             $r= rand(1,90000);
//  $new =  __DIR__.'/../libs/uplaod/'.$lien.'.jpg';
//  file_put_contents($new, $data);

             messages::setMsg('secceful!!','is uploaded','success');
            echo messages::getMsg();
           //  echo "<script type='text/javascript'>window.location.href = 'editpost?v=$id'</script>";
        }
        else
        {
              messages::setMsg('no!!','is uploaded','danger');
            echo messages::getMsg();
        }
        }
            
        }

        
    public function delfin($id)
    {
        $this->query('*','users' , "WHERE `id` = '1'");
           if($this->execute() and $this->rowCount() > 0){
            
        $this->delete('vid','id_post',$id);
        if($this->execute())
        {
            messages::setMsg('secceful!!','is delete','success animate bonceIn');
            echo messages::getMsg();
        }else
        {
            messages::setMsg('opps!!','no delete','warning animate wobble');
            echo messages::getMsg();
        }
    } else
        {
             messages::setMsg('opps!!','no permission','warning');
            echo messages::getMsg();
        }
    
    }
    public function dels($id)
    {
        $this->query('*','users' , "WHERE `id` = '1'");
           if($this->execute() and $this->rowCount() > 0){
            
        $this->update('vid',"visible= 0",'id_post',$id);
        if($this->execute())
        {
            messages::setMsg('secceful!!','is delete','success animate bonceIn');
            echo messages::getMsg();
        }else
        {
            messages::setMsg('opps!!','no delete','warning animate wobble');
            echo messages::getMsg();
        }
    } else
        {
             messages::setMsg('opps!!','no permission','warning');
            echo messages::getMsg();
        }
    
    }
    public function rec($id)
    {
        $this->query('*','users' , "WHERE `id` = '1'");
           if($this->execute() and $this->rowCount() > 0){
            
        $this->update('vid',"visible= 1",'id_post',$id);
        if($this->execute())
        {
            messages::setMsg('secceful!!','is recovry','success animate bonceIn');
            echo messages::getMsg();
        }else
        {
            messages::setMsg('opps!!','no recovry','warning animate wobble');
            echo messages::getMsg();
        }
    } else
        {
             messages::setMsg('opps!!','no permission','warning');
            echo messages::getMsg();
        }
    
    }
    public function time($time)
    {
        $val = $time;
        $time = time();




        $timeall = $time - $val;
        if ($timeall < 60) {
            echo "قبل قليل";
        } else if ($timeall > 60 and $timeall < 3600) {
            $timed = $timeall / 60;
            $timed = floor($timed);
            echo '' . $timed . ' دقيقة';
        } else if ($timeall > 3600 and $timeall < 86400) {
            $timed = $timeall / 3600;
            $timed = floor($timed);
            echo '' . $timed . 'ساعة';
        } else if ($timeall > 86400 and $timeall < 604800) {
            $timed = $timeall / 86400;
            $timed = floor($timed);
            echo '' . $timed . ' يوم';
        } else if ($timeall > 604800 and $timeall < 18144000) {
            $timed = $timeall / 604800;
            $timed = floor($timed);
            echo '' . $timed . ' اسبوع';
        } else {
            echo 'غير محدد';
        }
    }

     public function times($time){
        $val = $time;
        $time =time();

$timeall = $time-$val;
 if ($timeall < 60){
       echo "قبل قليل";
 }else if ($timeall > 60 and $timeall <3600){
     $timed = $timeall/60;
     $timed = floor($timed);
    $success['success']= 'منذ  '.$timed.' دقيقة';
    
 }else if($timeall > 3600 and $timeall <86400){
     $timed = $timeall/3600;
     $timed = floor($timed);
    $success['success']= 'منذ '.$timed.' ساعة';
 }

else if($timeall > 86400 and $timeall <604800){
     $timed = $timeall/86400;
     $timed = floor($timed);
   $success['success']='منذ '.$timed.' يوم';
 }


else if($timeall > 604800 and $timeall <18144000){
     $timed = $timeall/604800;
     $timed = floor($timed);
    $success['success']='منذ '.$timed.' اسبوع';
 }


else {
     $success['success']=  'null';
 }

 echo json_encode($success);
    }
   
    }