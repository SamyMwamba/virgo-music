<?php
include_once "entete.php";
?>
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey hide-on-large-only">
            <i class="mdi-action-search active"></i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>

    </div>
    <!--breadcrumbs end-->


    <!--start container-->
    <div class="container">
        <div class="section">

            <p class="caption">Avez-vous une question? N'hesitez pas de nous envoyer un message. Notre equipe sera heureuse de vous aider .</p>

            <div class="divider"></div>

            <div id="contact-page" class="card">

                <div class="card-content">
                    <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                        <i class="mdi-editor-mode-edit"></i>
                    </a>

                    <div class="row">
                        <div class="col s12 m6">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="namecontact" name="nom" type="text">
                                        <label for="first_name">Nom</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="emailcontact" name="email" type="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="message" id="messagecontact" class="materialize-textarea"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" id="submitcontact" name="action">Envoyer
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="col s12 m6">
                            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header"><i class="mdi-communication-live-help"></i> FAQ</div>
                                    <div class="collapsible-body" style="">
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="collapsible-header active"><i class="mdi-communication-email"></i> Besoin d'aide?</div>
                                    <div class="collapsible-body" style="display: none;">
                                        <p>vos suggetions et vos questions sont les bienvenues à l'adresse <a mailto="samymwamba@gmail.com">samymwamba@gmail.com</a>.Nous vous repondrons bientôt.</p>
                                        <p>Nous considerons tous nos clients avec une très grande affection; grâce à vous nous allons evoluer dans ce que nous faisons. <a href="http://www.itotafrica.com" target="_blank">Voir notre travail.</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="mdi-editor-insert-emoticon"></i> Testimonial</div>
                                    <div class="collapsible-body" style="">
                                        <blockquote> </blockquote>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">equipe virgo-music <i class="mdi-navigation-close right"></i></span>

                    <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Samy mwamba developpeur technicien</p>
                    <p><i class="mdi-communication-business cyan-text text-darken-2"></i>  Lubumbashi, Haut-katanga, RDC</p>
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +243 84 085 9515</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i>s.mwamba@itotafrica.com</p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i>samymwamba@gmail.com</p>

                </div>
            </div>
        </div>
    </div>
    <!--end container-->
</section>
<?php
include_once "pied.php";
?>