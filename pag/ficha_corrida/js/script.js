    const cpf = document.getElementById("cpf");

    cpf.addEventListener("input", function () {
        let valor = cpf.value.replace(/\D/g, "");

        if (valor.length > 11) {
            valor = valor.substring(0, 11);
        }

        valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
        valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
        valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        cpf.value = valor;
    });


    const telefone = document.getElementById("telefone");

    telefone.addEventListener("input", function () {
        let valor = telefone.value.replace(/\D/g, "");

        if (valor.length > 11) {
            valor = valor.substring(0, 11);
        }

        if (valor.length <= 10) {
            // Telefone fixo: (00) 0000-0000
            valor = valor.replace(/^(\d{2})(\d)/, "($1) $2");
            valor = valor.replace(/(\d{4})(\d)/, "$1-$2");
        } else {
            
            valor = valor.replace(/^(\d{2})(\d)/, "($1) $2");
            valor = valor.replace(/(\d{5})(\d)/, "$1-$2");
        }

        telefone.value = valor;
    });
