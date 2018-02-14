<?php
include_once "entete.php";
?>

<!-division nouveaute-->
<div class="container">
    <div class="row">
        <div class="col l12">



        </div>





 <div class="col s12 l9">
     <img src="" id="imgaudio">
     <div class="row" id="audio">
     </div>
     <div class="col l12 s12">
         <div class="row">
             <div class="col l6"> <h5 id="titreaudio"></h5> </div>
             <div class="col l4"><h5 id="nombredevuesaudio"></h5></div>
             <div class="col l12" id="leparaudio"></div>
         </div>

     </div>



             <?php
             if(isset($_SESSION['username']))
             {




                 ?>
     <div class="col l10 ">
         <h5 >Laisser un commentaire sur la chanson</h5>

         <div class="row">
         </div>
         <div class="row">

                 <textarea id="textareaaudio" placeholder="laisser un commentaire" name="comment" class="materialize-textarea" length="300"></textarea>


         </div>
         <div class="row">
             <button id="submitcommentaudio"  class="btn green">Commenter
             </button>
         </div>
         <div id="comments"></div>
     </div>
     </div>

                 <?php
             }
           else
           {





               ?>

               <div class="col l12" id="divcommentfalse">
                   <h5>Connectez-vous pour laisser un commentaire</h5>

                   <div class="row">
                   </div>

                   <div class="row">
                       <button id="connectcomment"  class="btn green">Connexion
                       </button>
                   </div>

               </div>


               <?php
           }



             ?>

         </div>
</div>
            <div class="row">
                <div class='col l3 m6 s12'>







            </div>
        </div>



<?php
include_once "pied.php";
?>