// onchange - Dispara o momento em que o valor do elemento é alterado.
// oncopy - Dispara o momento em que o usuário copia o conteúdo do elemento.
// oncut - Dispara o momento em que o usuário corta o conteúdo do elemento.
// onfocus - Dispara o momento em que o elemento recebe foco.
// onreset - Dispara o momento em que o formulário é resetado.
// onsearch - Dispara o momento em que o usuário digita algo no campo de busca.
// oninput - Script a ser executado quando o usuário digita algo no campo de entrada.

const inputs = document.querySelectorAll(".required");
function nameValidate() {
	if (inputs[0].value.length < 3) {
		setError(0);

	} else {
		removeError(0);
		console.log("Nome válido");
	}
}

const spans = document.querySelectorAll(".span-required");
const span_cor = document.querySelectorAll(".span-required-correct");
const input_color = document.querySelectorAll(".span-required-correct");

function setError(index) {
	spans[index].style.display = "block";
    span_cor[index].style.display = "none";
}

function removeError(index) {
	spans[index].style.display = "none";
	span_cor[index].style.display = "block";
}
