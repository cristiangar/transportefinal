const $btnEnviar = document.querySelector("#btnp1"),
	$mensaje = document.querySelector("#P1"),
	
	$mensajeRecibido = document.querySelector("#mensajeRecibido");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje = function (mensaje) {
	$mensajeRecibido.textContent = mensaje;
}

