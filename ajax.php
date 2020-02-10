<?php

include ("baglan.php");
if($_GET["func"]="gonder"){

  @$urun=array("id"=>$_POST['dataid'],"adet"=>$_POST['dataadet'],"fiyat"=>$_POST['datafiyat']);
    @$_SESSION["urunler"][$_POST['dataid']]=$urun;
  

      echo'<button  style="display:none;" class="btn btn-danger float-right my-2 silall" name="sil" ><i class="fa fa-trash"></i>  Səbəti boşalt </button>';
             
                 if(count(@$_SESSION["urunler"])==0){
                  
                  echo "<div align='center' class='text-center'> Səbət boşdur </div><br>
";
                                    echo "<script> 
                                    
                                     jQuery('.silall').hide();
                                    
                                     jQuery('#divsatinal').hide();

                                    </script>";

              }
                else{
                             echo "<script> 
                                    
                                     jQuery('.silall').show();
                                    
                                    
                                    </script><br>";
               

                   foreach(@$_SESSION["urunler"] as $uruncek){
       $sor=$db->prepare("Select * from urunler where id='$uruncek[id]' ");
$sor->execute();
    $row=$sor->fetch(PDO::FETCH_ASSOC);
       
     @$sekil= 'images/'.$row["resim"].'';
                
    
echo @$yazdir='
    <div class="col-lg-12 f">
            <div class="col-md-4 float-left my-5">
  
          <a href="#">
            <img src='.$sekil.' width="100" height="100"/>
          </a>
        </div>
        <div class="info">
          <p class="seller"><span class="text-danger">Ürün ismi:</span>'.@$row["adi"].'</p>
          <p class="seller"><span class="text-danger">Fiyatı:</span><span class="fiyat2" id='.@$row["fiyat"].'>'.@$uruncek["fiyat"].'</span> $</p>
                      <label><span class="text-danger">Adet:</span>
                    <button class=" decrease2 btn btn-info" id="decrease2" >-</button>
  <input type="text" id="number2" class="number2  text-danger" disabled name="number" value="'.@$uruncek["adet"].' " />
  <button class=" increase2 btn btn-info " id="increase">+</button>
</label>
          
          <p class="seller">'.@$row["aciklama"].'</p>

      <div align="right"><button class="btn btn-danger sil" name="sil" id="'.@$row['id'].'" value="'.@$row['id'].'">Sil</button></div>
</div>
<hr>
      </div>';
            
          

            } 
    
               
                }
    

}
?>

  <?php 
              if(count(@$_SESSION["urunler"])==0){
                  
                   echo "";
              }
                else{
                    
                    echo '<div align=right id="divsatinal"><p class="alert alert-success text-danger font-weight-bold"> Toplam: <span id="toplam"> </span> $</button><p>
<button class="btn btn-primary" id="satinal"> Satın Al</button></div><hr>';
                }
     ?>
	<script type="text/javascript">
     
                jQuery(document).ready(function(){
       
   
        
         var text=0;
                    
    $(".info .fiyat2").each(function() {   
           text+=parseFloat($(this).text());  

        $("#toplam").html(text);
       });
                });
        
        
jQuery('.gonder').on("click",function(){
         
         
    var dataid=jQuery(this).attr("id");
    var dataadet=jQuery(this).parent(".divurun").find(".number").val();
    var datafiyat=jQuery(this).parent(".divurun").find(".fiyat").html();
             jQuery(this).parent(".divurun").find(".increase").prop("disabled",true);
             jQuery(this).parent(".divurun").find(".decrease").prop("disabled",true);
      


jQuery(this).removeClass("btn btn-primary gonder");
            jQuery(this).addClass("btn btn-danger s");
            jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Səbətdədir");
         jQuery(this).prop("disabled",true);
         
         var urun=jQuery("#goster").text();
          urun++;
         
        
         
        jQuery.ajax({
        type: 'post',
        data: {dataid:dataid,dataadet:dataadet,datafiyat:datafiyat},
        url:'ajax.php?func=gonder',

        success: function(result) {
            jQuery("#goster").html(urun);
           jQuery('#gizle').html(result);

     jQuery("#tema").show().fadeOut(1000);
      


        },
               
           statusCode:{
               
               404:function(){
                   
                   alert("yoxdu sehife");
                   
                   
               }
           }   
          })
    
    
     });
 
         jQuery('.sil').click(function(){
     

  var text2=jQuery(this).parent().parent().find(".fiyat2").text();
                       var t= $("#toplam").text();
                       $("#toplam").text(t-text2);
             
var dataid=jQuery(this).attr("id");
            jQuery(this).parent().parent().parent().hide(200);

                jQuery(this).parent().parent().find(".fiyat2").text(0);
             
                     var text2=0;
 
              $(".info .fiyat2").each(function() {   
           text2+=parseFloat($(this).text());  

        $("#toplam").text(text2);
       });    
             
             
             
             var saytext=jQuery("#goster").text();
             var say=parseInt(saytext);
                       say--;
jQuery("#goster").text(say);

                     if( say==0  ){
            jQuery('.silall').hide();
                jQuery('#gizle').html("<br><div align='center'> Səbət boşdur </div><br>");
           jQuery('#gizle').fadeOut();
             }
         

             
       $(".divurun button").each(function() {   
           if(jQuery(this).attr("id")==dataid){
jQuery(this).removeClass("btn btn-danger s");
          jQuery(this).addClass("btn btn-primary gonder");
            jQuery(this).html("Səbətə at");
               jQuery(this).prop("disabled",false);
               
                 jQuery(this).parent(".divurun").find(".increase").prop("disabled",false);
             jQuery(this).parent(".divurun").find(".decrease").prop("disabled",false);
               
               
               
           }
       });
         
             
         
           jQuery.ajax({
        type: 'post',
        data: {dataid:dataid},
               url:'sil.php?func=sil',
        success: function(result) {
            jQuery("#tema2").show().fadeOut(1000);

        },
               
           statusCode:{
               
               404:function(){
                   
                   alert("yoxdu sehife");
                   
                   
               }
           }   
          })
    
    
     });
  
         jQuery('.silall').click(function(){
           $("#toplam,#satinal").hide();

           jQuery.ajax({
        type: 'post',
               url:'sil.php?func=allsil',
        success: function(result) {

              location.reload();

        },
               
           statusCode:{
               
               404:function(){
                   
                   alert("yoxdu sehife");
                   
                   
               }
           }   
          })
    
    
     });


     
     
     
     jQuery('.increase2').click(function(){
        
var number=jQuery(this).parent("label").find(".number2").val();
    
                       number++;
 

jQuery(this).parent("label").find(".number2").val(number); 
        var val=jQuery(this).parent("label").find(".number2").val();     

        
       var fiyat=jQuery(this).parent("label").parent(".info").find(".fiyat2").attr("id");     
    
       var vurma= (parseFloat(fiyat)*parseFloat(val)).toFixed(2);

  jQuery(this).parent("label").parent(".info").find(".fiyat2").html(vurma);
           var text2=0;
         
          $(".info .fiyat2").each(function() {   
           text2+=parseFloat($(this).text());  

        $("#toplam").text(text2);
       }); 
         

    });
     

       jQuery('.decrease2').click(function(){
        
        var number=jQuery(this).parent("label").find(".number2").val();
    
   
        number--;
                 if(number!=0 || number>0){
jQuery(this).parent("label").find(".number2").val(number);
      var val=jQuery(this).parent("label").find(".number2").val();     
        var fiyatesas=jQuery(this).parent("label").parent(".info").find(".fiyat2").attr("id");     

       var bolme= (parseFloat(fiyatesas)*parseFloat(val)).toFixed(2);

  jQuery(this).parent("label").parent(".info").find(".fiyat2").html(bolme);
                                var text2=0;
         
          $(".info .fiyat2").each(function() {   
           text2+=parseFloat($(this).text());  

        $("#toplam").text(text2);
       }); 
         
        }
        else{
            jQuery(this).parent("label").find(".number2").val(1);     

            
        }
        
    });
     
     

   
    </script>
