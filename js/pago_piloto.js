const boton_mod = document.querySelector("#btnenviar"),
		$mensaje1=document.querySelector("#id_tbl_piloto"),
		$mensaje2=document.querySelector("#id_tbl_envio");
let ventana_mod;
boton_mod.addEventListener("click", (e) =>{
	// Agregar listener
	// Aquí todo el código que se ejecuta cuando se da click al botón
	$id_piloto_pago=$mensaje1.value;
	$id_envio=$mensaje2.value;
	ventana_mod=window.open("../views/ModificarExtra.php?id_pago="+$id_piloto_pago+"&id_envio="+$id_envio+"&m%N/a","miwin","width=1167,height=568,top=150px,left=250px,scrollbars=yes")
	e.preventDefault();
});