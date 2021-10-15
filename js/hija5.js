const $btnEnviar = document.querySelector("#btnp5"),
	$mensaje = document.querySelector("#P5"),
	
	$mensajeRecibido5 = document.querySelector("#mensajeRecibido5");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje5(mensaje);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje5 = function (mensaje) {
	$mensajeRecibido5.textContent = mensaje;
}