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

let boton= document.getElementById("regresar");
boton.addEventListener("click", ()=>{
  window.location = "../dynamics/php/cerrar.php";
});
