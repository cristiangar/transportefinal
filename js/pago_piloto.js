const boton_mod = document.querySelector("#btnenviar");
let ventana_mod;
boton_mod.addEventListener("click", (e) =>{
	// Agregar listener
	// Aquí todo el código que se ejecuta cuando se da click al botón
	ventana_mod=window.open("../views/ModificarExtra.php","miwin","width=1167,height=568,top=150px,left=250px,scrollbars=yes")
	e.preventDefault();
});