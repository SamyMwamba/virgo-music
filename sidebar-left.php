

<!-- START HEADER -->
<header id="header" class="page-topbar ">

    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="left">
                    <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/virgo-logo-200x34.png" alt="virgo-music"></a> <span class="logo-text">virgo-music</span></h1></li>
                </ul>
<?php if(isset($_SESSION['username'])) {


                        ?><i class="logo-wrapper right hide-on-large-only"><img id="iconuser"
                                                                               class="mdi-action-account-circle" src="<?php  echo $_SESSION['photo']?>"
                                                                               style="width:48px; height: 48px;  margin-top: 5px "></i><?php } ?>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <form id="formrecherche" action="searchxyz.php" method="get">
                    <i class="mdi-action-search"></i>
                    <input type="text" id="recherche" name="datasearch" class="header-search-input recherche" placeholder="Rechercher titre chanson,clip ,artiste"/>
                    </form>
                </div>

                <ul class="right hide-on-med-and-down">
                    <?php if(isset($_SESSION['username'])) {


                        ?>

                        <li><a href="javascript:void(0);"
                               class="waves-effect waves-block waves-light notification-button"
                               data-activates="notifications-dropdown"><i><img id="iconuser"
                                                                               class="mdi-action-account-circle" src="<?php echo $_SESSION['photo']?>"
                                                                               style="width:48px; height: 48px;  margin-top: 5px "></i>

                            </a>

                        </li>
                        <?php
                    }
                    else {


                        ?>
                        <li><a href="javascript:void(0);"
                               class="waves-effect waves-block waves-light notification-button"
                               data-activates="notifications-dropdown"><i><img id="iconuser"
                                                                               class="mdi-action-account-circle" src=""
                                                                               style="width:48px; height: 48px;  margin-top: 5px "></i>

                            </a>

                        </li>
                        <?php
                    }
                    ?>





                    <li><a href="contact.php" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                    </li>

                </ul>
                <!-- translation-button -->

                <!-- notifications-dropdown -->
                <ul id="notifications-dropdown" class="dropdown-content">
                    <li>
                        <h5 >Deconnexion </h5>
                    </li>

                    <li class="divider"></li>


                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">

                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-content-add-circle"></i> POSTER</a>
                            <div class="collapsible-body" style="display: none;">
                                <ul>
                                    <li class="bold"><a href="audiopost.php" class="waves-effect waves-cyan  text-left"><i class="mdi-image-audiotrack"></i> AUDIO</a>
                                    </li>
                                    <li class="bold"><a href="post.php" class="waves-effect waves-cyan  text-left"><i class="mdi-av-video-collection"></i> VIDEOS</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="audio.php" class="waves-effect waves-cyan  text-left"><i class="mdi-image-audiotrack"></i> AUDIO</a>
                </li>
                <li class="bold"><a href="index.php" class="waves-effect waves-cyan  text-left"><i class="mdi-av-video-collection"></i> VIDEOS</a>
                </li>

                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">


                        <li class="bold"><a href="contact.php" class="  waves-effect waves-cyan  text-left"><i class="mdi-communication-phone"></i> CONTACT</a>
                        </li>

                        <?php

                        if(isset($_SESSION['username']))
                        {
                            ?>
                            <li class="bold"><a id="deconface" class="waves-effect waves-cyan  text-left" ><i class="mdi-social-person-outline"></i> DECONNEXION</a>

                        </li>
                        <?php

                        }

else{
?>
                     <li class="bold"><a id="conface" class="waves-effect waves-cyan  text-left" ><i class="mdi-social-person-outline"></i> CONNEXION</a>

                        </li>
                        <?php
}

                        ?>


                    </ul>
                </li>
                <li></li>


            </ul>

            <div class="fb-share-button fixed-action-btn horizontal" data-href="http://virgo-music.com" data-mobile-iframe="true">
                <a class="fb-xfbml-parse-ignore btn-floating btn-large red" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fvirgo-music.com%2F&amp;src=sdkpreparse">
                    <i class="large material-icons mdi-social-share"></i>
                </a>
                <ul>

                </ul>
            </div>

            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
