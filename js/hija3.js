const $btnEnviar = document.querySelector("#btnp3"),
	$mensaje = document.querySelector("#P3"),
	
	$mensajeRecibido3 = document.querySelector("#mensajeRecibido3");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje3(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje3 = function (mensaje) {
	$mensajeRecibido3.textContent = mensaje;
}