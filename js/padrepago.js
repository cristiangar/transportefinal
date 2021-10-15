const boton = document.querySelector("#boton9");

	 
	  //boton7 = document.querySelector("#boton7"),;//declaro las variables de los botones para abrir ventanas

const $mensajeRecibido9=document.querySelector("#pagina9"),
      $mensajeRecibido10=document.querySelector("#pagina10"),
      $mensajeRecibido11=document.querySelector("#pagina11"),
      $mensajeRecibido12=document.querySelector("#pagina12");
	  
	   //$mensajeRecibido7=document.querySelector("#pagina7");//declaro los input que voy a llenar


let ventana9//declaro ventanas
boton.addEventListener("click", (e) =>{
	// Agregar listener
	// Aquí todo el código que se ejecuta cuando se da click al botón
	ventana9=window.open("listapilotopago.php","miwin","width=1167,height=568,top=150px,left=250px,scrollbars=yes")
	e.preventDefault();
});


// funcion que le da un valor al input cliente
function establecerMensaje9(mensaje) {
	$mensajeRecibido9.value = mensaje;
}
function establecerMensaje10(mensaje2) {
	$mensajeRecibido10.value = mensaje2;
}

function establecerMensaje11(mensaje3) {
	$mensajeRecibido11.value = mensaje3;
}

function establecerMensaje12(mensaje4) {
	$mensajeRecibido12.value = mensaje4;
}


