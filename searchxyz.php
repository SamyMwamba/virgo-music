<?php

include_once "entete.php";
?>

<section id="content" >

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <form method="post" action="enterxyzsearch.php">
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="search" id="recherche" class="header-search-input recherche" placeholder="Rechercher artiste,clip">

            </div>

        </form>
    </div>


        <!-- START CONTENT -->
        <section id="content" class="">


            <div id="breadcrumbs-wrapper">

                <div class="col l12 s12 m12" >
                <div class="row"  id="contenairsearch">
                    <div class="center-align" id="spinner">
                        <img src="images/loader.gif" id="img-spinner" alt="Chargement..." />
                    </div>

                </div>
                </div>
                <div class="center" >

                </div>
            </div>



        </section>
</section>

<div
 <?php
include_once "pied.php";
?>