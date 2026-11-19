const campoCPF = document.getElementById('cpf');
const campoTelefone = document.getElementById('telefone');

function mascararCpf(){
    const digitos = campoCPF.value;
    digitos.replace(/\D/g, '');
    let formatado = digitos;

    if (length(digitos) <= 3) {
        formatado = digitos.slice(0,3);
    } else if (length(digitos) <= 6) {
        formatado = formatado + "." + digitos.slice(3,6);
    } else if (length(digitos) <= 9) {
        formatado = formatado + "." + digitos.slice(6,9);
    } else if(length(digitos) > 9) {
        formatado = formatado + "-" + digitos.slice(9);
    }

    campoCPF.value(formatado);
}

function mascararTelefone() {
    const digitosTel = campoTelefone.value;
    digitosTel.replace(/\D/g, '');
    let formatadoTel = digitosTel

    if (length(digitosTel) <= 2) {
        formatadoTel = "(" + digitosTel.slice(0,2);
    } else if(length(digitosTel) <= 3) {
        formatadoTel = formatadoTel + ") " + digitosTel.slice(2,3);
    } else if (length(digitosTel) <= 7) {
        formatadoTel = formatadoTel + " "  + digitosTel.slice(3,7);
    } else if (length(digitosTel) > 7) {
        formatadoTel = formatadoTel + "-" + digitosTel.slice(7);
    }

    campoTelefone.value(formatadoTel);
}

campoCPF.addEventListener('input', mascararCpf);
campoTelefone.addEventListener('input', mascararTelefone);