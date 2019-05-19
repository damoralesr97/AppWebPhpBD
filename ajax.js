function buscarCorreo(){

    var correo = document.getElementById("correoBuscar").value;
    if(correo == ""){
        document.getElementById("buzon").innerHTML = "";
    }else {
        if (window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            //Code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("buzon").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/config/buscarCorreo.php?correo="+correo,true);
        xmlhttp.send();
    }

}