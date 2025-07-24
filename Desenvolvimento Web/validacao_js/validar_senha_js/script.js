const senha = document.querySelectorAll(".required");
const spans = document.querySelectorAll(".span-required");
const span_cor = document.querySelectorAll(".span-required-correct");
const input_color = document.querySelectorAll(".span-required-correct");

function passwordValidate1() {
	if (senha[0].value.length >= 8) {
		removeError(0);
		console.log("Tamanho válido");
	} else {
		setError(0);
		console.log("Tamanho inválido");
	}
}

function passwordValidate2() {
	if (senha[1].value == senha[0].value) {
		removeError(1);
		console.log("Tamanho válido");
	} else {
		setError(1);
		console.log("Tamanho inválido");
	}
}

function setError(index) {
	spans[index].style.display = "block";
	span_cor[index].style.display = "none";
    input_color[index].style.backgroundColor = "red";
}

function removeError(index) {
	spans[index].style.display = "none";
	span_cor[index].style.display = "block";
        input_color[index].style.backgroundColor = "green";

}
