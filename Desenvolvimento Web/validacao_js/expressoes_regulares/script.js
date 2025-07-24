// document.write(/[abc]/.test("abc"));
// verifica se a string contém pelo menos um dos caracteres 'a', 'b' ou 'c'

// document.write(/^\d{2}\/\d{2}\/\d{4}$/.test("12/46/7890"));
// o ^ indica o início da string e o $ indica o final
// \d representa um dígito numérico, e {2} indica que deve haver exatamente dois dígitos
// \/ (barra "/") é usado para escapar a barra, pois ela tem um significado especial em expressões regulares

// var dia = /^(0[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
// document.write(dia.test("32"));
// document.write(dia.test("30"));

// var mes = /^(0[1-9]|1[0-2])$/;
// document.write(mes.test("13"));
// verifica se o mês está entre 01 e 12
// document.write(mes.test("02"));

// var ano = /^\d{4}$/;
// verifica se o ano é composto por exatamente quatro dígitos
// document.write(ano.test("1999"));

// var data = /^(0[1-9]|1[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/;
// verifica se a data está no formato DD/MM/AAAA
// document.write(data.test("30/02/2020"));

// var cpf = /^([0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2})$/;
// verifica se o CPF está no formato XXX.XXX.XXX-XX
// document.write(cpf.test("123.456.789-00"));

// var email = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,}$/;
// verifica se o email está no formato nome@dominio.dominio
// document.write(email.test("nome@dominio.dominio"));

const inputs = document.querySelectorAll(".required");
const spans = document.querySelectorAll(".span-required");
const email = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,}$/;

function emailValidate() {
	if (email.test(inputs[0].value)) {
		removeError(0);
	} else {
		setError(0);
	}
}

function setError(index) {
	spans[index].style.display = "block";
	spans[index].style.color = "red";
}

function removeError(index) {
	spans[index].style.display = "none";
}
