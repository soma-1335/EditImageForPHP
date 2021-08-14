<?php
/** セッション情報を破棄する */
    session_start();

    $_SESSION = array();
    session_destroy();

    header('Location: ../html/index.html');
?>