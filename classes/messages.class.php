
<?php

class messages{
    public static $messages;
    public static function setMsg($title,$msg,$type){
        self::$messages='<div style="margin-top:1%" class="alert alert-'.$type.' text-center" role="alert">
		
  '.$title.' <a class="alert-link">'.$msg.'
</div></a>';
    }
    public static function getMsg(){
        return self::$messages;
    }
}