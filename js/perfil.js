function validar() {
    var novasenhaverifica = form_senha.novasenhaverifica.value;
    var novasenha = form_senha.novasenha.value;

    if (novasenha != novasenhaverifica){
        alert('Senhas não conferem!');
        form_senha.novasenhaverifica.focus();
        return false;
    }else{
        return true;
    }
}

window.onload = function() {
    var f_select = document.getElementById("atual")
    f_select.onchange = func_atual

    function func_atual(){
        var atual = form_xp.atual.value;
        
        if (atual == 1){
            document.getElementById("fim_e").required = false;
            document.getElementById("fim_e").disabled = true;
        }else{
            document.getElementById("fim_e").required = true;
            document.getElementById("fim_e").disabled = false;
        }
    }

};

