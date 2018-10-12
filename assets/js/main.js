var inpSend = document.getElementById('send');
var inpRecep = document.getElementById('recep');
var inpFile = document.getElementById('fileToUpload');

document.getElementById('submit-picture').addEventListener('click', function (e){
    if (inpSend.value <= 3){
        e.preventDefault();
        _("loaded_n_total").innerHTML = "Merci d'indiquer l'e-mail de l'envoyeur";
    }
    else if (inpRecep.value <= 3) {
        e.preventDefault();
        _("loaded_n_total").innerHTML = "Merci d'indiquer l'e-mail du destinataire";
    }
    else if (!inpFile.files[0]){
        e.preventDefault();
        _("loaded_n_total").innerHTML = "Merci de sélectionner un fichier";
    } 
});


function _(el) {
    return document.getElementById(el);
}
  
function uploadFile() {
    var file = _("fileToUpload").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("fileToUpload", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "result", true); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url
    ajax.send(formdata);
}
  
function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}
  
function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 100; //wil clear progress bar after successful upload
}
  
function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";
}
  
function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
}




$(document).ready(function(){ 
    var i = 0; 
    setInterval(function(){ 
    $('#background').removeClass("bg1, bg2, bg3, bg4").addClass("bg"+(i++%4 + 1)); 
    }, 10000); 
});