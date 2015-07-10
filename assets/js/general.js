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

function toggleLike(base_url, id_post, user_id) {
    like = document.querySelector('[id^=like-]');
    bool = like.textContent == "Like" ? "0" : "1";
    id = like.id.split("-")[1];

    var xmlHttp = getXMLHttp();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            if (xmlHttp.responseText) {
                var arr = xmlHttp.responseText.split("\n");
                like.id = "like-" + arr[0];
                like.textContent = arr[1];
            }
        }
    }
    xmlHttp.open("GET", base_url + "/" + id + "/" + id_post + "/" + user_id + "/" + bool, true);
    xmlHttp.send(null);
    return false;
}