
//function qui recupere le numero de la pagination cliquee


$(document).ready(function(){
    $('.pagination .pagili',this).click(function(){
        var current=this.firstChild.firstChild.data;
        submitChat(current);


    });


});


Materialize.toast('Bienvenue sur katangamusic !', 2500); // 4000 is the duration of the toast
Materialize.toast('Nous vous aimons... !',2000); // 4000 is the duration of the toast
Materialize.toast('Katanga music... !',3000); // 4000 is the duration of the toast


$(document).ready(function($){
    $('.recherche').autocomplete({
        source:'selectsearchdata.php',
        minLength:2,
        select: function(event,ui){
            var code = ui.item.id;
            if(code != '') {location.href = '/enterxyzsearch.php?id=' + code;
            }
        },
// optional
        html: true,
// optional (if other layers overlap the autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
});


$( function() {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    $( ".frecherche" ).autocomplete({
        source: availableTags
    });
} );


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

function facebookLogin()
{

    firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a Facebook Access Token. You can use it to access the Facebook API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;
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
}

$(document).ready(function () {
    $("#conface").click(function () {
        // facebookLogin();
        alert("hello wold");
    });
});

$(document).ready(function () {
    alert("jquery fonctionne");
});