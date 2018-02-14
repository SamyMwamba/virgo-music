<?php
$infosfichier = pathinfo($_FILES['monfichier']['name']);


$infosimage = pathinfo($_FILES['imagevignette']['name']);
$nomfichier=$_FILES['monfichier']['name'];
$vignette=$_FILES['imagevignette']['name'];
$cleanspace="".time().str_replace(" ","",$nomfichier);//suppression des espaces dans le fichier
$cleanunder=str_replace("_","",$cleanspace);//suppression des under score dans le fichier
$cleantiret=str_replace("-","",$cleanunder);//suppression des tirets dans le fichier
$cleanapo=str_replace("'","",$cleantiret);//suppression des tirets dans le fichier
$cleanpara=str_replace("(","",$cleanapo);//suppression des parenthese dans le fichier
$cleanpara21=str_replace(")","",$cleanpara);//suppression des parenthese dans le fichier

//vigentte sans espace
$cleanspace2="".time().str_replace(" ","",$vignette);//suppression des espaces dans le fichier
$cleanunder2=str_replace("_","",$cleanspace2);//suppression des under score dans le fichier
$cleantiret2=str_replace("-","",$cleanunder2);//suppression des tirets dans le fichier
$cleanapo2=str_replace("'","",$cleantiret2);//suppression des tirets dans le fichier
$cleanpara2=str_replace("(","",$cleanapo2);//suppression des parenthese dans le fichier
$cleanpara22=str_replace(")","",$cleanpara2);//suppression des parenthese dans le fichier
$chemin=$cleanpara21;//le nom du dossier et le nom du fichier
$chemimage=$cleanpara22;//le nom du dossier et le nom du fichier
$extension_upload = $infosfichier['extension'];
$extension_uploadimage = $infosimage['extension'];
$extensions_autorisees = array( 'mp3');
$extensions_autoriseesimage= array('jpg', 'png','PNG','JPG','JPEG');
if (in_array($extension_upload, $extensions_autorisees) AND in_array($extension_uploadimage, $extensions_autoriseesimage))
{
    try{
        // On peut valider le fichier et le stocker définitivement
        move_uploaded_file($_FILES['monfichier']['tmp_name'], "00118/".basename($cleanpara21));
        move_uploaded_file($_FILES['imagevignette']['tmp_name'], "00118_vi/". basename($cleanpara22));
        $a=array();
        $b=array();
        $b["chemin"]=$chemin;
        $b["vignette"]=$chemimage;
        array_push($a,$b);
        echo json_encode($a);

    }
    catch (Exception $ex)
    {

        echo "impossible d'uploader votre fihchier, probleme du serveur";
    }

}
else
{

    echo "<button type='button' id='yourElement' class='btn waves-effect waves-light light-blue accent-3 animated infinite rubberBand'>ERREUR</button>
<h4 class='red-text'>Le type de votre fichier  ou le type de la photo est incorrect.</h4><h4 class='green-text'>essayez audio mp3  vigentte jpg ou png.</h4>";
}

?>