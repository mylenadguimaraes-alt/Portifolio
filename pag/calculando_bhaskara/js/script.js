function calcularBhaskara() {

    // Pegando os valores digitados
    let a = parseFloat(document.getElementById("valorA").value);
    let b = parseFloat(document.getElementById("valorB").value);
    let c = parseFloat(document.getElementById("valorC").value);

    let resultado = document.getElementById("resultado");

    // Verificando se os valores foram digitados
    if (isNaN(a) || isNaN(b) || isNaN(c)) {

        window.alert("Digite os valores de a, b e c.");
        return;
    }

    // Uma equação de segundo grau precisa ter a diferente de zero
    if (a === 0) {

        window.alert("O valor de 'a' deve ser diferente de zero.");
        return;
    }

    // Calculando Delta
    let delta = (b * b) - (4 * a * c);

    // Verificando o valor de Delta
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

