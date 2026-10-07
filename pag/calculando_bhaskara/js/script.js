function calcularBhaskara() {

    let a = parseFloat(document.getElementById("valorA").value);
    let b = parseFloat(document.getElementById("valorB").value);
    let c = parseFloat(document.getElementById("valorC").value);

    let resultado = document.getElementById("resultado");

    if (isNaN(a) || isNaN(b) || isNaN(c)) {

        window.alert("Digite os valores de a, b e c.");
        return;
    }

   if (a === 0) {

        window.alert("O valor de 'a' deve ser diferente de zero.");
        return;
    }

    let delta = (b * b) - (4 * a * c);

    if (delta < 0) {

        resultado.innerHTML =
            "Delta = " + delta + "<br>" +
            "Não existem raízes reais.";

    } else if (delta === 0) {

        let x = (-b) / (2 * a);

        resultado.innerHTML =
            "Delta = " + delta + "<br>" +
            "A equação possui uma raiz real.<br>" +
            "x = " + x;

    } else {

        let x1 = (-b + Math.sqrt(delta)) / (2 * a);
        let x2 = (-b - Math.sqrt(delta)) / (2 * a);

        resultado.innerHTML =
            "Delta = " + delta + "<br>" +
            "x₁ = " + x1 + "<br>" +
            "x₂ = " + x2;
    }
}

function fLimpar() {
    document.getElementById("valorA").value = "";
    document.getElementById("valorB").value = "";
    document.getElementById("valorC").value = "";
    document.getElementById("resultado").innerHTML = "O resultado aparecerá aqui.";
}

