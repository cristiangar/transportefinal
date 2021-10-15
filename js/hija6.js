const $btnEnviar = document.querySelector("#btnp6"),
	$mensaje = document.querySelector("#P6"),
	
	$mensajeRecibido6 = document.querySelector("#mensajeRecibido6");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje6(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje6 = function (mensaje) {
	$mensajeRecibido6.textContent = mensaje;
}