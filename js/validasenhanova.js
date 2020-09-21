function validar() {
    var novasenhaverifica = form_senha.novasenhaverifica.value;
    var novasenha = form_senha.novasenha.value;

    if (novasenha != novasenhaverifica){
        alert('Senhas não conferem!');
        form_senha.novasenhaverifica.focus();
    }
}