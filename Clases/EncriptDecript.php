<?php
 class EncriptDecript
{
private function keyed($txt,$encrypt_key) {
        $encrypt_key = md5($encrypt_key);
        $ctr=0;
        $tmp = "";
        for ($i=0;$i<strlen($txt);$i++)
        {
        if ($ctr==strlen($encrypt_key)) $ctr=0;
        $tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
        $ctr++;
        }
        return $tmp;
  }

private function encryption($txt, $sub = 0, $start = 3) {
       //$key = $this->encryption_key;
       $key = "hihuihuihiuhuh";

       if($sub)$key = substr($key, $start, $sub);

       srand((double)microtime()*1000000);

       $encrypt_key = md5(rand(0,32000));
       $encrypt_key = md5(9265);
       $ctr=0;
       $tmp = "";
       for ($i=0;$i<strlen($txt);$i++)
       {
       if ($ctr==strlen($encrypt_key)) $ctr=0;
       $tmp.= substr($encrypt_key,$ctr,1) .
       (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
       $ctr++;
       }
       //return keyED($tmp,$key);
       $a = self::keyed($tmp,$key);
       return base64_encode($a);
 }

 public function decryption($txt, $sub = 0, $start = 3) {
       //$key = $this->encryption_key;
       $key = "hihuihuihiuhuh";

       if($sub)$key = substr($key, $start, $sub);
       $txt = base64_decode($txt);
       $txt = self::keyed($txt,$key);       //
       $tmp = "";
       for ($i=0;$i<strlen($txt);$i++)
       {
       $md5 = substr($txt,$i,1);
       $i++;
       $tmp.= (substr($txt,$i,1) ^ $md5);
       }
       return $tmp;
 }
}


 ?>
