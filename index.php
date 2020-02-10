<?php
include ("baglan.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Ana səhifə</title>
    
    <style>

        ul{
            margin:0;
            padding:0;
            list-style-type: none;
        }
        button{
                 cursor: pointer;
 
        }
        
    .myAlert-bottom{
    position: fixed;
    bottom: 5px;
    right:2%;
    width: 30%;
        opacity:1;
        z-index: 1;
}
        input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}
          input#number2 {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}
.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  text-align: center;
  vertical-align: middle;
  background: #eee;

    cursor:pointer;
}
        #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}
        #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}
 
    </style>
</head>
<body>
<div class="container" style="margin-top: 5px">
   
   <div>
    <h4 class="float-right"><a id="goster2" style='margin-right: 6px; margin-top: 6px;' href="#">Səbət <i id="sebeticon" class="fa fa-shopping-cart"></i></a><span id="goster" class="text-danger" style='position: absolute;top: 0px;'><?php echo count(@$_SESSION["urunler"]);?></span> </h4>
    </div>
           <br>
           <br>


            <div  style="display:none; background-color: rgb(212, 249, 212);" id="gizle">
                          
           <button  style="display:none;" class="btn btn-danger float-right my-2 silall" name="sil" ><i class="fa fa-trash"></i>  Səbəti boşalt </button>
           <div id="divsil">
<br>
 <?php 
              if(count(@$_SESSION["urunler"])==0){
                  
                  echo "<div align='center' class='text-center'> Səbət boşdur </div><br>";
                   echo "<script>  jQuery('.silall').hide(); 
                    jQuery('#divsatinal').hide();

                   
                   </script>";
              }
               
                else{
                     echo "<script> jQuery('.silall').show();  </script>";
                
                   foreach(@$_SESSION["urunler"] as $uruncek){
       $sor=$db->prepare("Select * from urunler where id='$uruncek[id]'");
$sor->execute();
    $row=$sor->fetch(PDO::FETCH_ASSOC);
       
     @$sekil= 'images/'.$row["resim"].'';
                
                ?>
            
    <div class="col-lg-12 f">
            <div class="col-md-4 float-left my-5">
  
          <a href="#">
            <img src='<?php echo $sekil;?>' width="100" height="100"/>
          </a>
        </div>
        <div class="info">
          <p class="seller"><span class="text-danger">Ürün ismi:</span> <?php echo @$row["adi"];?></p>
          <p class="seller"><span class="text-danger">Fiyatı:</span> <span class="fiyat2" id='<?php echo @$row["fiyat"];?>'><?php echo @$uruncek["fiyat"];?></span> $</p>
          <label class="seller"><span class="text-danger">Adet:</span>
                    <span class=" decrease2 btn btn-info" id="decrease" >-</span>
  <input type="text" id="number2" class="number2  text-danger" disabled name="number" value="<?php echo @$uruncek["adet"];?>" />
  <span class=" increase2 btn btn-info " id="increase2">+</span>
            </label> 
          <p class="seller"> <?php echo @$row["aciklama"];?></p>
          
   <div align="right"><button class="btn btn-danger sil" name="sil" id="<?php echo @$row['id'];?>" value="<?php echo @$row['id'];?>">Sil</button></div>
</div>
      
    
     <hr> 
     
      </div>
               
  

            <?php }} ?>
  
    </div>
     <?php 
              if(count(@$_SESSION["urunler"])==0){
                  
                   echo "";
              }
                else{
                    
                    echo '<div align=right id="divsatinal"><p class="alert alert-success text-danger font-weight-bold"> Toplam: <span id="toplam"> </span> $</button><p>
<button class="btn btn-primary" id="satinal"> Satın Al</button></div><hr>';
                }
     ?>

    </div>
    
    
    
 <br>
  <hr>
 


 <div id="tema" style="display:none" class="myAlert-bottom alert alert-success float-right "> Səbətə əlavə olundu</div>
   <div id="tema2" style="display:none" class="myAlert-bottom alert alert-danger float-right ">Silindi</div>


    <div class="col-lg-12 bg-primary ">
              <?php 
         $sor=$db->prepare("Select * from urunler");
$sor->execute();
       while($row=$sor->fetch(PDO::FETCH_ASSOC)){
?>
            <div class="col-md-4 float-left my-5 divurun">
            <img src="images/<?php echo $row["resim"];?>" width="100" height="100" /><br><br>
          <label><span class="text-danger">Ürün ismi:</span> <?php echo $row["adi"];?> </label><br>
          <span class="text-danger">Fiyatı:</span> <label id="<?php echo $row["fiyat"];?>" class="fiyat"><?php echo $row["fiyat"];?></label> $ <br>
                    <label><span class="text-danger">Adet:</span>
                    <button class=" decrease btn btn-info" id="decrease" >-</button>
  <input type="text" id="number" class="number  text-danger" disabled name="number" value="1" />
  <button class=" increase btn btn-info " id="increase">+</button>
</label>                
  
<br>

          <label><span class="text-danger">Açıklama:</span><?php echo substr($row["aciklama"],0,100);?>...</label><br>
   
<button class="text-center btn btn-primary gonder" name="gonder" data-id="<?php echo $row["id"];?>" id="<?php echo $row["id"];?>" />  Səbətə at</button>
         
          <br>
      </div>
    <?php   } ?>
      </div>
     <div style="clear:both;"></div>
 <footer>
    
    <div style="bottom:0px;left:20%; left:0;" align="center"><p style="color:red; font-weight:bold;  text-align:center; " class="container col-md-12 col-lg-12">ⒸCreated by <a href="https://www.facebook.com/Shamo.Hasanov">Shamo Hasanov</a></p></div>
  </footer>

    </div>
    

 <script>
     jQuery(document).ready(function(){
   
     $("#divsil .f").each(function() {
var id=jQuery(this).find(".sil").attr("id");
    

        $(".divurun button").each(function() {   
   
           if(jQuery(this).attr("id")==id){
               
   jQuery(this).removeClass("btn btn-primary gonder");
            jQuery(this).addClass("btn btn-danger s");
            jQuery(this).html("<i class='fa fa-cart-arrow-down'></i> Səbətdədir");
         jQuery(this).prop("disabled",true);
               
               jQuery(this).parent(".divurun").find(".increase").prop("disabled",true);
             jQuery(this).parent(".divurun").find(".decrease").prop("disabled",true);
               
               
               
           }
    
    });
       });
       
  
         
         
   });
        var text=0;
    $(".info .fiyat2").each(function() {   
           text+=parseFloat($(this).text());  

        $("#toplam").text(text);
       });    

     
          jQuery('#goster2').click(function(){
           jQuery('#gizle').slideToggle(500);
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


$('.gonder').on('click', function () {
        var cart = $('#sebeticon');
        var imgtodrag = $(this).parent('.divurun').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');

          
 
            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    });

     
    jQuery('.increase').click(function(){
        
var number=jQuery(this).parent("label").find(".number").val();
    
                       number++;
 

jQuery(this).parent("label").find(".number").val(number); 
        var val=jQuery(this).parent("label").find(".number").val();     

        
       var fiyat=jQuery(this).parent("label").parent(".divurun").find(".fiyat").attr("id");     
    
       var vurma= (parseFloat(fiyat)*parseFloat(val)).toFixed(2);

  jQuery(this).parent("label").parent(".divurun").find(".fiyat").html(vurma);
        
               jQuery(this).parent("label").parent(".divurun").find(".gonder").prop("disabled",false);  

    });
     

       jQuery('.decrease').click(function(){
        var text=0;
               $(".info .fiyat2").each(function() {   
           text+=parseFloat($(this).text());  

        $("#toplam").html(text);
       });
           
           
           
        var number=jQuery(this).parent("label").find(".number").val();
    
   
        number--;
                 if(number!=0 || number>0){
jQuery(this).parent("label").find(".number").val(number);
      var val=jQuery(this).parent("label").find(".number").val();     
        var fiyatesas=jQuery(this).parent("label").parent(".divurun").find(".fiyat").attr("id");     

       var bolme= (parseFloat(fiyatesas)*parseFloat(val)).toFixed(2);

  jQuery(this).parent("label").parent(".divurun").find(".fiyat").html(bolme);
        }
        else{
            jQuery(this).parent("label").find(".number").val(1);     
            jQuery(this).parent(".divurun").find(".gonder").prop("disabled",true);     

            
        }
        
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
    
    
    
    
</body>
</html>