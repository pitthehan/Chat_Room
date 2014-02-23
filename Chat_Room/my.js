function getXmlHttpObject() {

    var xmlHttpRequest;
    if (window.ActiveXObject) {
        xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        xmlHttpRequest = new XMLHttpRequest();
    }

    return xmlHttpRequest;
}

function $(id) {
    return document.getElementById(id);
}