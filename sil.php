<?php
    header('Content-type: text/html; charset=utf-8');
include ("baglan.php");

if($_GET["func"]=="sil"){

        $sor=$db->prepare("UPDATE  urunler set 
      
      session=:session 
      where id=:id");
$kaydet=$sor->execute(array(
    'session'=>0,
    'id'=>$_POST['dataid']
    
    ));
    
                		unset ($_SESSION["urunler"][$_POST['dataid']]);

}
if($_GET["func"]=="allsil"){
   $sor=$db->prepare("UPDATE  urunler set 
      session=:session 
     ");
$kaydet=$sor->execute(array(
    'session'=>0

    ));
                		unset ($_SESSION["urunler"]);
    

}
?>
