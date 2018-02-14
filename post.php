<?php
include_once "entete.php";
?>

        <!-la barrede recherche-->
	        <div class="container datadivi" id="datadivi">
            <div class="row">
                <div class="center">
        <?php
        //On affiche un message de bienvenue, si lutilisateur est connecte, on affiche son pseudo
        ?>
                    <div class="col l6 offset-l3">     <h5 class="card"> Bonjour<span class="red-text"><?php if(isset($_SESSION['username'])){echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');} ?></span>,vous êtes sur le point de publier une vidéo <br/> mais avant veuillez <a href="#termes1">lire</a> les <span class="blue-grey-text">termes et conditions</span><br/> </h5><br /></div>

        <?php
        //Si lutilisateur est connecte, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
        if(isset($_SESSION['username']))
        {
            ?>
            <div class="container ">
                <div class="row">
                    <div class="col l6 card">
                        <form method="post" enctype="multipart/form-data" id="uploadForm">

                            <div class="field">
                                <div class="input-field col l6 s12">
                                    <input id="titre" type="text" name="titre" class="validate" length="100" required="required">
                                    <label for="titre">Titre de la vidéo</label>
                                </div>
                                <div class="input-field col l6 s12">
                                    <input id="artiste" type="text" name="artiste" class="validate" length="100" required="required">
                                    <label for="artiste">Nom de l'artiste de la video</label>
                                </div>

                            </div>

                            <div class="clearfix"></div>
                            <div class="file-field input-field">
                                <div class="btn red accent-4">
                                    <span >Votre video</span>
                                    <input type="file"   name="monfichier" id="monfichier" required="required">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" required="required" >
                                </div>
                            </div>


                            <div class="clearfix"></div>
                            <div class="file-field input-field">
                                <div class="btn red accent-4">
                                    <span>Vignette</span>
                                    <input type="file" id="imagevignette" name="imagevignette" required="required">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" required="required" >
                                </div>
                            </div>
                            <br/>

                            <button type="submit"  class="collapsed btn green " id="btnpublier">PUBLIER</button>

                        </form>


                    </div>
                    <div class="z-depth-5">
                    <div id="loader-icon" style="display:none;"><img src="img/LoaderIcon.gif" /></div>
                    <div id="progress-div"><div id="progress-bar"></div></div>
                    <div id="targetLayer"></div>

                        <div class="col l6  center-align card" id="termes1">
                            <h3>Termes et Conditions</h3>
                            <p>
                                Virgo-music est un site libre en chargement et telechargement de videos et audios
                                <br/>
                                En postant une chason sur ce site nous reconnaissons que<span class="spanrouge"> l'auteur                               ou l'artiste de la chanson
                                est d'accord</span> sur le fait que sa musique soit postée sur notre site.
                                Nous declinons toute responsabilite en cas de probleme ou de non-accord avec l'artiste originale.

                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal Trigger -->

        <?php
        }
        else
        {
//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
            ?>
            <div class="col l12">
            <h4>veuillez vous connecter pour pouvoir poster...</h4>

            <button class="btn green waves-red" onclick="facebookLogin()">Se connecter</button>
            </div>
        <?php
        }
        ?>
    <!- fin la barre de recherche-->



                    </div>
                </div>
            </div>

    <div class="clearfix"></div>
<?php
include_once "pied.php";
?>