<?php
function isConnected (): bool {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(session_status() === PHP_SESSION_DISABLED){
        session_abort();
    }
        return !empty($_SESSION['connecte']);
}
?>