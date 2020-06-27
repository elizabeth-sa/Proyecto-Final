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
let cerrar= document.getElementById("cerrar");
cerrar.addEventListener("click", ()=>{
  window.location = "./cerrar.php";
});
let administrar= document.getElementById("administrar");
administrar.addEventListener("click", ()=>{
  window.location = "./Admin.php";
});
//Si no hay una sesión redirige al inicio
if (obtenerCookie("ElAullido")!="3141592653") {
  window.location = "../../index.html";
}
