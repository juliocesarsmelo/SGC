<?php 

    //  Iniciando sessão ou resumindo sessão existe  
    session_start();  

    // .............................................................. //
    //  Fazendo Logout no sistema                                     //
    // .............................................................. //
    session_destroy();
    
    header("Location: ../index.php");