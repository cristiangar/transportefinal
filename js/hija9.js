const $btnEnviar = document.querySelector("#btnp9"),
	$mensaje = document.querySelector("#P9"),
	$mensaje2 = document.querySelector("#P10"),
	$mensaje3 = document.querySelector("#P11"),
	$mensaje4 = document.querySelector("#P12");
	
	$mensajeRecibido9 = document.querySelector("#mensajeRecibido9");
	$mensajeRecibido10 = document.querySelector("#mensajeRecibido10");
	$mensajeRecibido11 = document.querySelector("#mensajeRecibido11");
	$mensajeRecibido12 = document.querySelector("#mensajeRecibido12");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value,
		  mensaje2 = $mensaje2.value,
		  mensaje3 = $mensaje3.value,
		  mensaje4 = $mensaje4.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje9(mensaje);
		window.opener.establecerMensaje10(mensaje2);
		window.opener.establecerMensaje11(mensaje3);
		window.opener.establecerMensaje12(mensaje4);
	}
});

// Definición de función desde la que nos llama el padre
window.establecerMensaje9 = function (mensaje) {
	$mensajeRecibido9.textContent = mensaje;
}

window.establecerMensaje10 = function (mensaje2) {
	$mensajeRecibido10.textContent = mensaje2;
}

window.establecerMensaje11 = function (mensaje3) {
	$mensajeRecibido11.textContent = mensaje3;
}

window.establecerMensaje12 = function (mensaje4) {
	$mensajeRecibido12.textContent = mensaje4;
}

