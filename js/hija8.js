const $btnEnviar = document.querySelector("#btnp8"),
	$mensaje = document.querySelector("#P8"),
	$mensaje14 = document.querySelector("#P14"),
	
	$mensajeRecibido8 = document.querySelector("#mensajeRecibido8");
	$mensajeRecibido14 = document.querySelector("#mensajeRecibido14");



	$btnEnviar.addEventListener("click", () => {
	const mensaje =$mensaje.value;
	const mensaje14=$mensaje14.value;
	if (!mensaje) return alert("Escribe un mensaje");
	if (window.opener) {
		window.opener.establecerMensaje8(mensaje);
		window.opener.establecerMensaje14(mensaje14);
	}
});


// Definición de función desde la que nos llama el padre
window.establecerMensaje8 = function (mensaje) {
	$mensajeRecibido8.textContent = mensaje;
}
window.establecerMensaje14 = function (mensaje14) {
	$mensajeRecibido14.textContent = mensaje14;
}
