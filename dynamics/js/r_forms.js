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
let boton= document.getElementById("regresar");
boton.addEventListener("click", ()=>{
  window.location = "./registro.html";
});

//Si hay una sesión redirige al perfil
if (obtenerCookie("ElAullido")=="3141592653") {
  window.location = "../dynamics/php/perfil.php";
}
