<!-- END CONTENT -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<?php include('sidebar-right.php'); ?>

<!-- ================================================
Scripts
================================================ -->
<!-- Using jQuery with a CDN -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<script src="http://vjs.zencdn.net/6.6.0/video.js"></script>

<!--materialize js-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>



<!-- chartjs -->
<script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>


<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="js/custom-script.js"></script>


<!-- JS file -->
<script src="easyautocomplete/jquery.easy-autocomplete.min.js"></script>

<script src="js/actualiser.js"></script>
<script>

    //function qui recupere le numero de la pagination cliquee


    $(document).ready(function(){
        $('.pagination .pagili',this).click(function(){
            var current=this.firstChild.firstChild.data;
           $.ajax({
               url:"recup_msg.php",
               method:"post",
               data:{current:current},
               success:function (result) {
                   $("#contenairvideo").html(result);

               }
           })


        });


    });

</script>

<script>

    Materialize.toast('Bienvenue sur Virgo music !', 2500); // 4000 is the duration of the toast

    Materialize.toast('Virgo music... !',3000); // 4000 is the duration of the toast
</script>
<script>





</script>

<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDcWqnFVL1M5HDz4_w9Wofb4cB-FmAFXsU",
        authDomain: "katangamusic-c271d.firebaseapp.com",
        databaseURL: "https://katangamusic-c271d.firebaseio.com",
        projectId: "katangamusic-c271d",
        storageBucket: "",
        messagingSenderId: "613541496630"
    };
    firebase.initializeApp(config);
    var provider = new firebase.auth.FacebookAuthProvider();
    provider.setCustomParameters({
        'display': 'popup'
    });

    function facebookLogin()
    {
        var resultat=false;

        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            var username=user.displayName;
            var userphoto=user.photoURL;
            var userid=user.uid;

            if(username !== null && username!==''){
                resultat=true;

                $.ajax({
                    url:"config.php",
                    method:'POST',
                    data:{photo:userphoto, username:username, userid:userid},
                    success:function (result) {
                       if(result==='ok' || result =='ok')
                       {
                           $("#iconuser").attr('data-image',userphoto);
                           $("#iconuser").attr('data-xoriginal',userphoto);
                           $("#iconuser").attr('src',userphoto);
                           $("#deconface").html("<i class=\"mdi-social-person-outline\"></i> DECONNEXION");
                           $("#conface").html("<i class=\"mdi-social-person-outline\"></i> DECONNEXION");
                           $("#iconuser").show();
                           $("#divcommentfalse").html(" <h5>Laisser un commentaire sur la video</h5>\n" +
                               "\n" +
                               "         <div class=\"row\">\n" +
                               "         </div>\n" +
                               "         <div class=\"row\">\n" +
                               "             <div class=\"input-field col l12 s12\">\n" +
                               "                 <textarea id=\"textarea1\" name=\"comment\" class=\"materialize-textarea\" length=\"300\"></textarea>\n" +
                               "                 <label for=\"textarea1\">Commentaire</label>\n" +
                               "             </div>\n" +
                               "         </div>\n" +
                               "         <div class=\"row\">\n" +
                               "             <button id=\"submitcomment\" onclick=' writeUserData();' class=\"btn green\">Commenter\n" +
                               "             </button>\n" +
                               "         </div>");
                           window.location.replace(window.location.pathname);
                       }
                    }
                });

            }




            console.log(user);
            // ...
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
        console.log(resultat);
    }

    function faceOut() {

        firebase.auth().signOut().then(function() {
            $.ajax({
                url:"config.php",
                method:'POST',
                data:{deconnexion:"decon"},
                success:function (result) {
                    Materialize.toast(result, 2500);

                }
            });
            $("#iconuser").attr('src',"");
            $("#deconface").html("<i class=\"mdi-social-person-outline\"></i> CONNEXION");
            $("#conface").html("<i class=\"mdi-social-person-outline\"></i> CONNEXION");
        }).catch(function(error) {
            console.log(error);
        });

    }
</script>
<script>
    $(document).ready(function () {
        $("#conface").click(function () {
            var action=this.firstChild.nextSibling.textContent;
            if(action==="CONNEXION" || action===" CONNEXION")
               facebookLogin();

            else{

                faceOut();
                checkpath();
            }


        });


    });

    $("#deconface").click(function () {

        var action=this.firstChild.nextSibling.textContent;
        if(action==="DECONNEXION" || action===" DECONNEXION") {
            faceOut();
            checkpath();
        }
        else{
                facebookLogin();
        }


    });

</script>

<script>
    function writeUserData() {
       var database= firebase.database();
        var ref=database.ref('commentaires' );
        comments=$("#textarea1").val();
        poste_par = "<?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>";
        poste_photo = "<?php if(isset($_SESSION['photo'])) echo $_SESSION['photo']; ?>";
         poste_id = "<?php if(isset($_SESSION['userid']))echo $_SESSION['userid']; ?>";
         poste_date="<?php echo Date('Y/m/d') ?>";
         poste_sur="<?php if(isset($_GET['id_vid'])) echo  $_GET['id_vid']?>";



       var data={

           poste_corps: comments,
           poste_par:poste_par,
           poste_id:poste_id,
           poste_date:poste_date,
           poste_photo:poste_photo,
           poste_sur:poste_sur

       };
       ref.push(data);


    }

    function writeUserDataAudio() {
        var database= firebase.database();
        var ref=database.ref('commentairesaudio' );
        comments=$("#textareaaudio").val();
        poste_par = "<?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>";
        poste_photo = "<?php if(isset($_SESSION['photo'])) echo $_SESSION['photo']; ?>";
        poste_id = "<?php if(isset($_SESSION['userid']))echo $_SESSION['userid']; ?>";
        poste_date="<?php echo Date('Y/m/d') ?>";
        poste_sur="<?php if(isset($_GET['id_audio'])) echo  $_GET['id_audio']?>";



        var data={

            poste_corps: comments,
            poste_par:poste_par,
            poste_id:poste_id,
            poste_date:poste_date,
            poste_photo:poste_photo,
            poste_sur:poste_sur

        };
       ref.push(data);



    }


    function writeUserDataContact() {
        var database= firebase.database();
        var ref=database.ref('messagescontacts' );

        nom=$("#namecontact").val();
        email=$("#emailcontact").val();
        message=$("#messagecontact").val();
        poste_date="<?php echo Date('Y/m/d') ?>";




        var data={

            nom: nom,
            email:email,
            message:message,
            poste_date:poste_date

        };
        ref.push(data);
$("#namecontact").val("");
$("#emailcontact").val("");
$("#messagecontact").val("");
Materialize.toast("MESSAGE ENVOYE",2000);

    }




    $("#submitcomment").click(function () {

        writeUserData();
        //getCommentVideosByid(comments);

    });

    $("#submitcommentaudio").click(function () {

        writeUserDataAudio();
        //getCommentVideosByid(comments);

    });


    $("#submitcontact").click(function () {

        writeUserDataContact();
        //getCommentVideosByid(comments);

    });

</script>
<script>
    $(document).ready(function(){
        $("#connectcomment").click(function(){
            facebookLogin();
            $('#spanconfig').load(document.URL +  ' #spanconfig').fadeIn();
            $('#divcomment').load(document.URL +  ' #divcomment').fadeIn();
        });


    });


    function checkpath() {
        var pathname = window.location.pathname;
        var tab=pathname.split("/");
        var long=tab.length;
        var current=tab[long-1];
        if(current !== "index.php" || current != "index.php")
        {
            window.location.replace("index.php");

        }


    }
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }



    function controlpagedonnee() {
        var pathname = window.location.pathname;
        var tab=pathname.split("/");
        var long=tab.length;
        var current=tab[long-1];

      if(current==="audio.php" || current=="audio.php")
        {
            toutdataaudio();
        }
      else if(current==="index.php" || current=="index.php" || current ==='' || current=='' || current===null)
      {
          toutdata();
      }

      else if(current==="watching.php" || current=="watching.php")
      {
          var abc = getParameterByName("id_vid");


          datacommentid(abc);
          dataid(abc);
      }
      else if(current==="watchingaudio.php" || current=="watchingaudio.php")
      {
          var abc2 = getParameterByName("id_audio");
          datacommentidaudio(abc2);
          dataidaudio(abc2);
          console.log(abc2);

      }

      else if(current==="searchxyz.php" || current=="searchxyz.php")
      {
          var abc3 = getParameterByName("datasearch");
          var donnees="";

          database=firebase.database();
          var ref=database.ref('videos');
          ref.orderByChild("toutindex").equalTo(abc3).on("child_added",function (snap) {
              var videos=snap.val();
              var keys=Object.keys(videos);


              var par_titre=videos.poste_titre;
              var par_artiste=videos.poste_artiste;
              var par_username=videos.poste_par_nom;
              var par_id=videos.poste_par_id;
              var par_photo=videos.poste_photo;
              var par_date=videos.poste_date;
              var par_path=videos.poste_cheminvideo;
              var par_path2=videos.poste_cheminphoto;
              var nbvues=videos.poste_nbvue;
              var indextout=videos.toutindex;
              var id=videos.refe;
              var url_root="<?php echo $url_root?>";

              function parseDate(str) {
                  return new Date(str);
              }

              function daydiff(first, second) {
                  return Math.round((second-first)/(1000*60*60*24));
              }
              var date1="<?php echo Date('Y/m/d')?>";

              var depuis=daydiff(parseDate(par_date), parseDate(date1));
              //var par_nombre_vues=videos[k].poste_vues;
              //var par_nombre_down=videos[k].poste_down;
              donnees =donnees+"<a href='watching.php?click=1&id_vid="+id+"&way="+par_path+"'><div id='listevideo' class='col m6 l3 s12'>  <div class='card white  vid'>\n" +
                  "                                    <div class='card-content'>\n" +
                  "                                       \n" +
                  "                                        <img src="+url_root+'/vue/00117_vi/' +par_path2+ " class='clipnew'> <h6 class='center-align center'>"+par_titre+"</h6><h6 class='center-align center'>"+par_artiste+"</h6>\n" +
                  "                                    </div>\n" +
                  "                                    <div class='card-action'>\n" +
                  "                                        <a  href=" +url_root+'/vue/00117/' +par_path+" class='btn-floating btn-move-up waves-effect waves-light green left' style ='margin-left: -20px;'><i class='mdi-file-file-download activator'></i></a>\n" +
                  "                                        "+depuis+" jours\n" +
                  "                                        <a class='btn-floating btn-move-up waves-effect waves-light darken-2 right'><i class='mdi-content-add activator'></i></a>\n" +
                  "\n" +
                  "                                                   "+nbvues+"vues\n" +
                  "                                    </div>\n" +
                  "                                    <div class='card-reveal'>\n" +
                  "                                        <span class='card-title grey-text text-darken-4'>INFOS SUR LA CHANSON <i class='mdi-navigation-close right'></i></span>\n" +
                  "                                        <h6>Postée par:<span class='blue-text'>" +par_artiste+ "</span> </h6>\n" +
                  "\n" +
                  "                                        <h6>Titre:<span class='blue-text'>" +par_titre+ " </span></h6>\n" +
                  "                                        <h6>Nombre de vues:<span class='blue-text'>" +nbvues+ " </span></h6>\n" +
                  "                                        <h6>Date de publcation:<span class='blue-text'>" +par_date+" </span></h6>\n" +
                  "                                    </div>\n" +
                  "\n" +
                  "                                </div></div></a>";

              $("#contenairsearch").html(donnees);

          });

      }

      else{
          toutdata();
      }
    }
</script>
<script>
    $(document).ready(function (e) {
        $("#uploadForm").on('submit',(function(e) {

            e.preventDefault();
            $("#message").empty();
            $('#loader-icon').show();
            $.ajax({
                url: "traiter.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                uploadProgress: function (event, position, total, percentComplete){
			Materialize.toast('Chargement en cours, veuillez patienter ! '+percentComplete+'%', 2500); // 4000 is the duration of the toast
                    $("#progress-bar").width(percentComplete + '%');
                    //  $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');
                    $("#progress-bar").html("  <div class='progress'> <div class='determinate green' style='width:'"+percentComplete +" ></div> </div>");},
                success: function(data)   // A function to be called if request succeeds
                {
			console.log(data);
                    $('#loader-icon').hide();
                    var titre=$("#titre").val();
                    var artiste=$("#artiste").val();
                    poste_par = "<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>";
                    poste_photo = "<?php if(isset($_SESSION['photo'])) echo $_SESSION['photo']; ?>";
                    poste_id = "<?php if(isset($_SESSION['userid'])) echo $_SESSION['userid']; ?>";
                    poste_date="<?php echo Date('Y/m/d') ?>";
                    poste_nombrevues=0;
                    var json = JSON.parse(data);
                    for(i=0;i<json.length;i++)
                    {
                        var cheminvideo=json[i].chemin;
                        var cheminvignette=json[i].vignette;

                       var database= firebase.database();
                        var ref=database.ref('videos' );
                        var datavideo={

                            poste_par_id:poste_id,
                            poste_par_nom:poste_par,
                            poste_date:poste_date,
                            poste_cheminvideo:cheminvideo,
                            poste_cheminphoto:cheminvignette,
                            poste_titre:titre,
                            poste_artiste:artiste,
                            poste_photo:poste_photo,
                            poste_nbvue:poste_nombrevues

                        };
                        var ref3=ref.push(datavideo);
                        var id=ref3.key;
                        console.log(id);
                        var videosref=firebase.database().ref('videos/'+id);
                        videosref.child('refe').set(id);

                       console.log(cheminvignette +"-"+cheminvideo+"-"+titre+"-"+artiste);
                    }

                }


            });
        }));



    });

</script>
<script>
    $(document).ready(function (e) {
        $("#uploadForm2").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $('#loader-icon').show();
            $.ajax({
                url: "traiteraudio.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                uploadProgress: function (event, position, total, percentComplete){
		Materialize.toast('Chargement en cours, veuillez patienter ! '+percentComplete+'%', 2500); // 4000 is the duration of the toast
			
                    $("#progress-bar").width(percentComplete + '%');
                    $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');
                    $("#progress-bar").html("  <div class='progress'> <div class='determinate green' style='width:'"+percentComplete +" ></div> </div>");},
                success: function(data)   // A function to be called if request succeeds
                {
console.log(data);
                    $('#loader-icon').hide();
                    var titre=$("#titre").val();
                    var artiste=$("#artiste").val();
                    poste_par = "<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>";
                    poste_photo = "<?php if(isset($_SESSION['photo'])) echo $_SESSION['photo']; ?>";
                    poste_id = "<?php  if(isset($_SESSION['userid'])) echo $_SESSION['userid']; ?>";
                    poste_date="<?php echo Date('Y/m/d') ?>";
                    poste_nombrevues=0;
                    poste_downs=0;
                    poste_likes=0;
                    var json = JSON.parse(data);
console.log(data);
                    for(i=0;i<json.length;i++)
                    {
                        var cheminaudio=json[i].chemin;
                        var cheminvignette=json[i].vignette;

                        var database= firebase.database();
                        var ref=database.ref('audios' );
                        var dataaudio={

                            poste_par_id:poste_id,
                            poste_par_nom:poste_par,
                            poste_date:poste_date,
                            poste_cheminaudio:cheminaudio,
                            poste_cheminphoto:cheminvignette,
                            poste_titre:titre,
                            poste_artiste:artiste,
                            poste_photo:poste_photo,
                            poste_nbvue:poste_nombrevues,
                            poste_downs:poste_downs,
                            poste_likes:poste_likes


                        };
                        ref.push(dataaudio);

                        console.log(cheminvignette +"-"+cheminaudio+"-"+titre+"-"+artiste);
                    }

                }


            });
        }));



    });

</script>

<script>
    function toutdata() {
        database=firebase.database();
        var ref=database.ref('videos');
        ref.on('value',recupData,errData);
    }
    function toutdataaudio() {
        database=firebase.database();
        var ref=database.ref('audios');
        ref.on('value',recupDataaudio,errData);
    }
    function recupData(data) {
        jsonObj = [];


        $("#spinner").show();
        var videos=data.val();
        var keys=Object.keys(videos);
        var donnees="";
        for(i=0;i<keys.length;i++)
        {
            var k=keys[i];
            var par_titre=videos[k].poste_titre;
            var par_artiste=videos[k].poste_artiste;
            var par_username=videos[k].poste_par_nom;
            var par_id=videos[k].poste_par_id;
            var par_photo=videos[k].poste_photo;
            var par_date=videos[k].poste_date;
            var par_path=videos[k].poste_cheminvideo;
            var par_path2=videos[k].poste_cheminphoto;
            var nbvues=videos[k].poste_nbvue;
            var indextout=videos[k].toutindex;
            item = {};
            item ["titre"] =indextout ;


            jsonObj.push(item);
            var url_root="<?php echo $url_root?>";

            function parseDate(str) {
                return new Date(str);
            }

            function daydiff(first, second) {
                return Math.round((second-first)/(1000*60*60*24));
            }
            var date1="<?php echo Date('Y/m/d')?>";
          
            var depuis=daydiff(parseDate(par_date), parseDate(date1));
            //var par_nombre_vues=videos[k].poste_vues;
            //var par_nombre_down=videos[k].poste_down;
             donnees =donnees+"<a href='watching.php?click=1&id_vid="+keys[i]+"&way="+par_path+"'><div id='listevideo' class='col m6 l3 s12'>  <div class='card white  vid'>\n" +
                "                                    <div class='card-content'>\n" +
                "                                       \n" +
                "                                        <img src="+url_root+'/vue/00117_vi/' +par_path2+ " class='clipnew'> <h6 class='center-align center'>"+par_titre+"</h6><h6 class='center-align center'>"+par_artiste+"</h6>\n" +
                "                                    </div>\n" +
                "                                    <div class='card-action'>\n" +
                "                                        <a  href=" +url_root+'/vue/00117/' +par_path+" class='btn-floating btn-move-up waves-effect waves-light green left' style ='margin-left: -20px;'><i class='mdi-file-file-download activator'></i></a>\n" +
                "                                        "+depuis+" jours\n" +
                "                                        <a class='btn-floating btn-move-up waves-effect waves-light darken-2 right'><i class='mdi-content-add activator'></i></a>\n" +
                "\n" +
                "                                                   "+nbvues+"vues\n" +
                "                                    </div>\n" +
                "                                    <div class='card-reveal'>\n" +
                "                                        <span class='card-title grey-text text-darken-4'>INFOS SUR LA CHANSON <i class='mdi-navigation-close right'></i></span>\n" +
                "                                        <h6>Postée par:<span class='blue-text'>" +par_artiste+ "</span> </h6>\n" +
                "\n" +
                "                                        <h6>Titre:<span class='blue-text'>" +par_titre+ " </span></h6>\n" +
                "                                        <h6>Nombre de vues:<span class='blue-text'>" +nbvues+ " </span></h6>\n" +
                "                                        <h6>Date de publcation:<span class='blue-text'>" +par_date+" </span></h6>\n" +
                "                                    </div>\n" +
                "\n" +
                "                                </div></div></a>";

        }
        $("#contenairvideo").html(donnees);
        console.log(jsonObj);
        var options = {
            data:jsonObj,

            getValue: "titre",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $("#recherche").easyAutocomplete(options);
    }

    function recupDataaudio(data) {
        $("#spinner").show();
        var donneesaudio="";
        var audios=data.val();
        var keys=Object.keys(audios);
        for(i=0;i<keys.length;i++)
        {
            var k=keys[i];
            var par_titre=audios[k].poste_titre;
            var par_artiste=audios[k].poste_artiste;
            var par_username=audios[k].poste_par_nom;
            var par_id=audios[k].poste_par_id;
            var par_photo=audios[k].poste_photo;
            var par_date=audios[k].poste_date;
            var par_path=audios[k].poste_cheminaudio;
            var par_path2=audios[k].poste_cheminphoto;
            var nbvues=audios[k].poste_nbvue;
            console.log(par_id);
            var url_root="<?php echo $url_root?>";

            function parseDate(str) {
                return new Date(str);
            }

            function daydiff(first, second) {
                return Math.round((second-first)/(1000*60*60*24));
            }
            var date1="<?php echo Date('Y/m/d')?>";

            var depuis=daydiff(parseDate(par_date), parseDate(date1));
            //var par_nombre_vues=videos[k].poste_vues;
            //var par_nombre_down=videos[k].poste_down;
             donneesaudio =donneesaudio+"<a href='watchingaudio.php?id_audio="+keys[i]+"&way="+par_path+"'><div id='listevideo' class='col m6 l3 s12'>  <div class='card white  vid'>\n" +
                "                                    <div class='card-content'>\n" +
                "    \n" +
                "                                        <img src="+url_root+'/vue/00118_vi/' +par_path2+ " class='clipnew'> <h6 class='center-align center'>"+par_titre+"</h6><h6 class='center-align center'>"+par_artiste+"</h6>\n" +
                "                                    </div>\n" +
                "                                    <div class='card-action'>\n" +
                "                                        <a  href=" +url_root+'/vue/00118/' +par_path+" class='btn-floating btn-move-up waves-effect waves-light green left' style ='margin-left: -20px;'><i class='mdi-file-file-download activator'></i></a>\n" +
                "                                        "+depuis+"jours\n" +
                "                                        <a class='btn-floating btn-move-up waves-effect waves-light darken-2 right'><i class='mdi-content-add activator'></i></a>\n" +
                "\n" +
                "                                                   "+nbvues+"vues\n" +
                "                                    </div>\n" +
                "                                    <div class='card-reveal'>\n" +
                "                                        <span class='card-title grey-text text-darken-4'>INFOS SUR LA VIDEO <i class='mdi-navigation-close right'></i></span>\n" +
                "                                        <h6>Postée par:<span class='blue-text'>" +par_artiste+ "</span> </h6>\n" +
                "\n" +
                "                                        <h6>Titre du clip:<span class='blue-text'>" +par_titre+ " </span></h6>\n" +
                "                                        <h6>Nombre de vues:<span class='blue-text'>" +nbvues+ " </span></h6>\n" +
                "                                        <h6>Date de publcation:<span class='blue-text'>" +par_date+" </span></h6>\n" +
                "                                    </div>\n" +
                "\n" +
                "                                </div></div></a>";

        }
        $("#contenairaudio").html(donneesaudio);


    }

    function errData(err) {
        console.log(err);
    }
    function dataid(id) {
        database=firebase.database();
        var ref=database.ref('videos');
        ref.orderByKey().equalTo(id).on("child_added",function (snap) {
            var videos=snap.val();
            var keys=Object.keys(videos);


                var par_titre=videos.poste_titre;
                var par_artiste=videos.poste_artiste;
                var par_username=videos.poste_par_nom;
                var par_id=videos.poste_par_id;
                var par_photo=videos.poste_photo;
                var par_date=videos.poste_date;
                var par_path=videos.poste_cheminvideo;
                var par_path2=videos.poste_cheminphoto;


                console.log(par_id);
                var url_root="<?php echo $url_root?>";

                function parseDate(str) {
                    return new Date(str);
                }

                function daydiff(first, second) {
                    return Math.round((second-first)/(1000*60*60*24));
                }
                var depuis=daydiff(parseDate(par_date), parseDate(<?php echo Date('Y/m/d')?>));
		var lecture="<?php if(isset($_GET['way'])) echo $_GET['way']; ?>";


            var donnees4 ="<div class='row'><div class='col l1'><img style='width: 48px;height: 48px' class=' circle'  src=" +par_photo+ " ></div><div class='col l6'><div class='row'><div class='col l12'><h6 style='font-style: bold' class='bold'>" +par_username+"</h6></div><div class='col l12'><h6 style='font-style: bold' class='bold'>Date Poste" +par_date+"</h6></div></div></div></div>";

            var donnees2 ="<video class='col l12 s12 responsive-video' id='my-video' class='video-js' controls preload='auto'  autoplay='false' controls  data-setup=\"{}\"> <source src="+url_root+'/vue/00117/' +lecture+ " type='video/mp4'>\n" +
                "    <source src="+url_root+'/vue/00117/' +lecture+ " type='video/webm'> </video>";
            var videosref=firebase.database().ref('videos/'+id);
            videosref.child('poste_nbvue').set(videos.poste_nbvue+1);
            $("#video").html(donnees2);
            $("#lepar").html(donnees4);
            $("#titrevideo").html(par_titre);
            $("#nombredevues").html(videos.poste_nbvue+1 + " Vues");


        });



    }




    function dataidaudio(id) {
        database=firebase.database();
        var ref=database.ref('audios');
        ref.orderByKey().equalTo(id).on("child_added",function (snap) {
            var audios=snap.val();
            var keys=Object.keys(audios);
            var par_titre=audios.poste_titre;
            var par_artiste=audios.poste_artiste;
            var par_username=audios.poste_par_nom;
            var par_id=audios.poste_par_id;
            var par_photo=audios.poste_photo;
            var par_date=audios.poste_date;
            var par_path=audios.poste_cheminaudio;
            var par_path2=audios.poste_cheminphoto;


            console.log(par_id);
            var url_root="<?php echo $url_root?>";

            function parseDate(str) {
                return new Date(str);
            }

            function daydiff(first, second) {
                return Math.round((second-first)/(1000*60*60*24));
            }
            var depuis=daydiff(parseDate(par_date), parseDate(<?php echo Date('Y/m/d')?>));



            var donnees4 ="<div class='row'><div class='col l1'><img style='width: 48px;height: 48px' class=' circle'  src=" +par_photo+ " ></div><div class='col l6'><div class='row'><div class='col l12'><h6 style='font-style: bold' class='bold'>" +par_username+"</h6></div><div class='col l12'><h6 style='font-style: bold' class='bold'>Date Poste" +par_date+"</h6></div></div></div></div>";

            var donnees2 ="<audio class='col l12 s12 responsive-video'   autoplay='false' controls src="+url_root+'/vue/00118/' +par_path+ " > </audio>";
            var audiosref=firebase.database().ref('audios/'+id);
            audiosref.child('poste_nbvue').set(audios.poste_nbvue+1);
            $("#audio").html(donnees2);
            $("#leparaudio").html(donnees4);
            $("#titreaudio").html(par_titre);
            $("#nombredevuesaudio").html(audios.poste_nbvue+1 + " Vues");
            $("#imgaudio").attr('src',url_root+"/vue/00118_vi/"+par_path2);


console.log(donnees2);

        });



    }



    function datacommentid(id) {
        var url_root="<?php echo $url_root?>";
        var donnees3="";
        database=firebase.database();
        var ref=database.ref('commentaires');

        ref.orderByChild('poste_sur').equalTo(id).on("child_added",function (snap) {
            var commentaires=snap.val();
            var keys=Object.keys(commentaires);


             photo=commentaires.poste_photo;
             username=commentaires.poste_par;
             corps=commentaires.poste_corps;
            donnees3 =donnees3+"<div class='row'><div class='col l1'><img style='width: 48px;height: 48px' class=' circle'  src=" +photo+ " ></div><div class='col l6'><h6 style='font-style: bold' class='bold'>"+username+"</h6></div><div class='col l12'><p>"+corps+"</p></div></div>";

            $("#comments").html(donnees3);


        });

    }



    function datacommentidaudio(id) {
        var url_root="<?php echo $url_root?>";
        var donnees3="";
        database=firebase.database();
        var ref=database.ref('commentairesaudio');

        ref.orderByChild('poste_sur').equalTo(id).on("child_added",function (snap) {
            var commentaires=snap.val();
            var keys=Object.keys(commentaires);


            photo=commentaires.poste_photo;
            username=commentaires.poste_par;
            corps=commentaires.poste_corps;
            donnees3 =donnees3+"<div class='row'><div class='col l1'><img style='width: 48px;height: 48px' class=' circle'  src=" +photo+ " ></div><div class='col l6'><h6 style='font-style: bold' class='bold'>"+username+"</h6></div><div class='col l12'><p>"+corps+"</p></div></div>";

            $("#comments").html(donnees3);


        });

    }



    $(document).ready(function () {

        controlpagedonnee();
    });

  //  toutdataaudio();
</script>

</body>

</html>
