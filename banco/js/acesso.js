function acesso(form) {
	if (form.nome.value == "Admin" && form.senha.value == "123"){
		location = 'index.html'
	}else{
		/*var x = form.nome.value
		var y = form.senha.value
		alert("Acesso negado! \nUsuário digitado: " + x + "\nSenha digitada "+ y)
	*/
	location = "negado.html"
	}
}