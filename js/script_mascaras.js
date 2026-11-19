const campoCPF = document.getElementById('cpf');
const campoTelefone = document.getElementById('telefone');

function mascararCpf(){
    const digitos = campoCPF.value.replace(/\D/g, '').slice(0,11);
    let formatado = digitos;

    if (digitos.length <= 3) {
        formatado = digitos.slice(0,3);
    } else if (digitos.length <= 6) {
        formatado = digitos.slice(0,3) + "." + digitos.slice(3);
    } else if (digitos.length <= 9) {
        formatado = digitos.slice(0,3) + "." + digitos.slice(3, 6) + "." + digitos.slice(6);
    } else if(digitos.length > 9) {
        formatado = digitos.slice(0,3) + "." + digitos.slice(3, 6) + "." + digitos.slice(6, 9) + "-" + digitos.slice(9);
    }

    campoCPF.value(formatado);
}

function mascararTelefone() {
    const digitosTel = campoTelefone.value.replace(/\D/g, '').slice(0,11);
    let formatadoTel = digitosTel

    if (digitosTel.length <= 2) {
        formatadoTel = "(" + digitosTel.slice(0,2);
    } else if(digitosTel.length <= 3) {
        formatadoTel = "(" + digitosTel.slice(0,2) + ") " + digitosTel.slice(2);
    } else if (digitosTel.length <= 7) {
        formatadoTel = "(" + digitosTel.slice(0,2) + ") " + digitosTel.slice(2,3) + " "  + digitosTel.slice(3);
    } else if (digitosTel.length > 7) {
        formatadoTel = "(" + digitosTel.slice(0,2) + ") " + digitosTel.slice(2,3) + " "  + digitosTel.slice(3, 7) + "-" + digitosTel.slice(7);
    }

    campoTelefone.value(formatadoTel);
}

campoCPF.addEventListener('input', mascararCpf);
campoTelefone.addEventListener('input', mascararTelefone);