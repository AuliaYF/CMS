$(document).ready(function() {
    $("a[id^='like-']").click(function(event) {
        var newId = event.target.id.indexOf("un") >= 0 ? event.target.id.replace("un", "") : "un" + event.target.id;
        var arr = newId.split("-")[1].split(",");
        var base_url = URL;
        var id_like = arr[0];
        var id_post = arr[1];
        var id_user = arr[2];

        if (newId.indexOf("un") >= 0) {
            toggleLike(URL, this, 0, id_post, id_user);
            $(this).html("Unlike");
        } else {
            toggleLike(URL, this, id_like, id_post, id_user);
            $(this).html("Like");
        }

        
        this.id = newId;
    });
    $('#dynTable').DataTable();
});

function getXMLHttp() {
    var xmlHttp
    try {
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!")
                return false;
            }
        }
    }
    return xmlHttp;
}

function toggleLike(base_url, element, id_like, id_post, user_id) {
    like = element;
    bool = like.textContent == "Like" ? "0" : "1";

    var xmlHttp = getXMLHttp();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            if (xmlHttp.responseText) {
                var arr = xmlHttp.responseText.split("\n");
                like.id = arr[0];
                like.textContent = arr[1];
            }
        }
    }
    xmlHttp.open("GET", base_url + "/" + id_like + "/" + id_post + "/" + user_id + "/" + bool, true);
    xmlHttp.send(null);
    return false;
}