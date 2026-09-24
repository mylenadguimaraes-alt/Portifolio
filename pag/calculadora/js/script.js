function fSoma() {    
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(n1) || isNaN(n2)){
        window.alert("Por favor, digite os dois números antes de realizar a operação.");
        return;
    }

    let soma;

    soma = n1 + n2;

    document.getElementById("resultado").innerHTML = soma;
}

function fSubtracao() {    
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(n1) || isNaN(n2)){
        window.alert("Por favor, digite os dois números antes de realizar a operação.");
        return;
    }

    let subtracao;

    subtracao = n1 - n2;

    document.getElementById("resultado").innerHTML = subtracao;
}

function fMultiplicacao() {    
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(n1) || isNaN(n2)){
        window.alert("Por favor, digite os dois números antes de realizar a operação.");
        return;
    }

    let multiplicacao;

    multiplicacao = n1 * n2;

    document.getElementById("resultado").innerHTML = multiplicacao;
}

function fDivisao() {    
    let n1 = parseFloat(document.getElementById("numero1").value);
    let n2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(n1) || isNaN(n2)){
        window.alert("Por favor, digite os dois números antes de realizar a operação.");
        return;
    }
    else if (n2 == 0){
        window.alert("Não é possível realizar uma divisão por zero.");
        return;

    }

    let divisao;

    divisao = n1/n2;

    document.getElementById("resultado").innerHTML = divisao;
}

function fLimpar() {
    document.getElementById("numero1").value = "";
    document.getElementById("numero2").value = "";
    document.getElementById("resultado").innerHTML = "0";
}