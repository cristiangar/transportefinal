const $btnEnviar = document.querySelector("#btnp2"),
	$mensaje = document.querySelector("#P2"),
	
	$mensajeRecibido2 = document.querySelector("#mensajeRecibido2");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje2(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje2 = function (mensaje) {
	$mensajeRecibido2.textContent = mensaje;
}