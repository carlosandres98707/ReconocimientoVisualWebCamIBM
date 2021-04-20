$(document).ready(main);

function main(){

    function soporteNavegador(){
        return !!(navigator.getUserMedia || (navigator.mozGetUserMedia ||  navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
    }

   
    var video = document.getElementById('video');
    var cerrar = document.getElementById('cerrar');
    var capturar = document.getElementById('capturar');
    var canvas = document.getElementById('canvas');
    var estado = document.getElementById('estado');

    video.style.height = "0px";
    cerrar.style.visibility = "hidden";
    capturar.style.visibility = "hidden";

    var soporte = soporteNavegador();
    console.log(soporte);


    if(soporte == true){

    $("#mostrar").click(mostrarCamara);
    function mostrarCamara(){
        navigator.mediaDevices.getUserMedia({ audio: false, video : true}).then((stream)=>{
            console.log(stream,"Permiso concedido"); 
            video.srcObject = stream;
            video.onloadedmetadata = (ev)=> video.play(); 
            video.style.height = "500px";
            cerrar.style.visibility = "visible";
            capturar.style.visibility = "visible";
            video.srcObject = stream;
            video.onloadedmetadata = (ev)=> video.play();
        }).catch((err)=> {
            console.log(err,"permiso denegado");
            alert("No diste permiso a tu navegador de usar la camara o no tienes ningun dispositivo  tipo audio/video conectado")
        });
    }

    $("#cerrar").click(cerrarCamara);
    function cerrarCamara(){
        video.style.height = "0px";
        cerrar.style.visibility = "hidden";
        capturar.style.visibility = "hidden";
        alert("OJO. Tu camara seguira prendida a menos que recargues tu navegador");
    }

    $("#capturar").click(tomarFoto);
    function tomarFoto(){      
                video.pause();
                let contexto = canvas.getContext("2d");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                contexto.drawImage(video, 0, 0, canvas.width, canvas.height);
                let foto = canvas.toDataURL();
                console.log(foto);
                estado.innerHTML = "Enviando foto. Por favor, espera...";
                document.getElementById("caja").value = foto;
                video.play();    
    }
   
    }else{
    alert("El navegador no soporta las caracteristicas requeridas");
    }
}