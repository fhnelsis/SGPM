<?php

/**
 * Verifica se o usuário está logado
 */
function verificarLogin(){
    if(!isset($_SESSION['LOGIN'])){
        header("Location: index.php");
    }
}

/**
 * Verifica a permissão de um usuário na página
 * 
 * @param string $permissao
 * @return boolean
 */
function verificarPermissao($permissao) {
    verificarLogin();
    return array_search($permissao, $_SESSION['LOGIN']['PERMISSOES']) !== false ? true : false;
}

/**
 * Verifica e redireciona o usuário caso este não possua acesso a uma página 
 * 
 * @param string $permissao
 */
function verificarPermissaoPagina($permissao) {
    verificarLogin();
    
    if (!verificarPermissao($permissao)) {
        header("Location: home.php");
    }
}

