function obtenerCookie(clave) { //Función para obener el valor de una cookie existente. En caso de no existir se devuelve "".
  var name = clave + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
  }
  return "";
}

//Con estos DOM´s agregamos eventos a los botoones para redirigir a otras páginas
let encuesta= document.getElementById("button");
encuesta.addEventListener("click", ()=>{
  window.location = "./templates/encuesta.html";
});
let inicio= document.getElementById("iniciar");
inicio.addEventListener("click", ()=>{
  window.location = "./templates/inicio_sesion.html";
});
let registro= document.getElementById("registro");
registro.addEventListener("click", ()=>{
  window.location = "./templates/registro.html";
});
//Si hay una sesión redirige al perfil
if (obtenerCookie("ElAullido")=="3141592653") {
  window.location = "./dynamics/php/perfil.php";
}
//con esta función eliminamos las lasCookies
/*function comercookies() {
  let tiempo = new Date();
  tiempo.setTime(tiempo.getTime() - 1);
  document.cookie = "dificulty=easy; expires=" + tiempo.toGMTString();
  document.cookie;
  document.cookie = "dificulty=medium; expires=" + tiempo.toGMTString();
  document.cookie;
  document.cookie = "dificulty=hard; expires=" + tiempo.toGMTString();
  document.cookie;
  window.location.reload();
}
function sesion(){
  let tiempo = new Date();
  tiempo.setTime(tiempo.getTime() + 1000*60*60*24);
  document.cookie = "sesion=t";
  window.location = "../index.html";
}*/
