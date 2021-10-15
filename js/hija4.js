const $btnEnviar = document.querySelector("#btnp4"),
	$mensaje = document.querySelector("#P4"),
	
	$mensajeRecibido4 = document.querySelector("#mensajeRecibido4");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje4(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje4 = function (mensaje) {
	$mensajeRecibido4.textContent = mensaje;
}