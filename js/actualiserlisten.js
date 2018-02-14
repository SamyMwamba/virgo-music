

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}


function refreshChat()
{
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById('infoaudio').innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "recup_msgaudio.php", true);
    xhr.send(null);
}

function submitChat(current)
{

    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById('infoaudio').innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "recup_msgaudio.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("current="+current);

}
/**
 * Created by int-samy-parseToM3 on 29/07/2016.
 */
