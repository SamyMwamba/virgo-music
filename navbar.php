<span id="spanconfig">
<?php

include("config.php");
?>
</span>

<ul id="dropdown2" class="dropdown-content">

    <li><a href="post.php">videos</a></li>
    <li><a href="#!">Audios</a></li>
    <li class="divider"></li>
    <li><a href="#!">News</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content col l2" >

      <li><a  href='connexion.php'><img src='img/user.png' style='width:25px;height: 25px'>Se connecter</a></li>
        <li><a href='sign_up.php'><img src='img/add184.png' style='width:25px;height: 25px'>S'enregistrer</a></li>
        <li><a  href='connexion.php'><img src='img/user.png' style='width:25px;height: 25px'>Se deconnecter</a></li>



</ul>
        <nav id="mynav" class="red darken-4">

                <a href="index.php" class="brand-logo"><span style="color:#000000">KATANGA</span>MUSIC</a>
                <ul class="right hide-on-med-and-down">

                    <li><a href="sass.html" class="waves-effect grey darken-4 btn">News</a></li>
                    <li><a href="badges.html" class="waves-effect grey darken-4 btn">Sponsors</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button waves-effect grey darken-4 btn" href="#!" data-activates="dropdown2">Post<i class="material-icons right"></i></a></li>
                    <li> <a class="dropdown-button tooltipped" href="#"  data-position="left" data-delay="50" data-tooltip="connexion" data-activates="dropdown3"><img src="img/menu.png" style="width:25px;height: 25px"></a></li>
                </ul>

                <ul id="slide-out" class="side-nav" >
                    <li id="logonav" style="height: 150px">Image</li>
                    <li  class="grey darken-4 waves-red"><a href="sass.html"  style="color:#ffffff">Nouvelles</a></li>
                    <li class="divider"></li>
                    <li  class="grey darken-4 waves-red"><a href="badges.html" style="color:#ffffff">Sponsors</a></li>
                    <li class="divider"></li>
                    <!-- Dropdown Trigger -->
                    <li class="waves-red" style="color:#ffffff;background-color:#B71C1C">Partager

                        <ul>
                            <li class="divider"></li>
                            <li class="grey darken-4 waves-red"><a href="post.php" style="color:#ffffff">videos</a></li>
                            <li class="divider"></li>
                            <li class="grey darken-4 waves-red" ><a href="#!" style="color:#ffffff">Audios</a></li>
                            <li class="divider waves-red"></li>
                            <li class="grey darken-4 waves-red"><a href="#!" style="color:#ffffff">Nouvelles</a></li>

                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href='sign_up.php'><img src='img/add184.png' style='width:25px;height: 25px'>S'enregistrer</a></li>
                    <li class="divider"></li>
                    <li><a  href='connexion.php'><img src='img/user.png' style='width:25px;height: 25px'>Se deconnecter</a></li>
                    <li class="divider"></li>
                    <li><a  href='connexion.php'><img src='img/user.png' style='width:25px;height: 25px'>Se connecter</a></li>
                </ul>
                <a  href="#" data-activates="slide-out" class="button-collapse"><img src="img/menu.png" style="width:25px;height: 25px"></a>
         </nav>

