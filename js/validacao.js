function enviar() {
    /* const botao = document.getElementById('enviar').addEventListener('onclick', console.log(`oi sou ${botao}`)) */

    const nome = document.getElementById('nome');
    const telefone = document.getElementById('telefone');
    const email = document.getElementById('email');
    const msg = document.getElementById('msg');


    if (nome.value == '') {
        alert(`campo nome obrigatório`);
        nome.focus();
        return false
    }
    if (telefone.value <= 11) {
        alert("campo telefone obrigatório")
        telefone.focus();
        return false;
    } else if (email.value == '') {
        alert(`campo email obrigatório `);
        email.focus();
        return false;
    } else if (msg.value == '') {
        alert(`campo mensagem obrigatório `);
        msg.focus();
        return false;
    } else {
        alert("enviar a mensagem?");

    }
}
const PegarDados = new XMLHttpRequest();
PegarDados.open("POST", "contato.php", true)
PegarDados.setRequestHeader("Content-type", "aplication/x-www-form-urlencoded")
PegarDados.onreadystatechange = function() {
    if (PegarDados.readyState === 4 && PegarDados.status === 200) {
        carregarDados();
    }
    PegarDados.send()
}