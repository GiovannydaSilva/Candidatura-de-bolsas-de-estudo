<?php

class User {

    //==================================
    public function EXE_QUERY($query, $parametros = null) {
        //SELECT

        // Resultados
        $resultados = null;

        //abre a ligação bd
        $ligacao = new PDO('mysql:host=' . $GLOBALS['bd_host'] . ';dbname=' . $GLOBALS['bd_name'] . ';charset=' . $GLOBALS['bd_charset'], $GLOBALS['bd_usuario'], $GLOBALS['bd_password'], array(PDO::ATTR_PERSISTENT => TRUE)
        );


        $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //executa query
        if ($parametros != null) {
            $gest = $ligacao->prepare($query);
            $gest -> execute($parametros);
            $resultados = $gest->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $gest = $ligacao->prepare($query);
            $gest -> execute();
            $resultados = $gest->fetchAll(PDO::FETCH_ASSOC);
        }
        // fechar a liga��o
        $ligacao = null;

        return $resultados;
    }
    //==================================
    public function EXE_NON_QUERY($query, $parametros = null) {
        //INSERT , UPDATE , DELETE
        //abre a liga��o � bd
        $ligacao = new PDO('mysql:host=' . $GLOBALS['bd_host'] . '; dbname=' . $GLOBALS['bd_name'] . ';charset=' . $GLOBALS['bd_charset'], $GLOBALS['bd_usuario'], $GLOBALS['bd_password'], array(PDO::ATTR_PERSISTENT => TRUE)
        );


        $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //executa a query
        $ligacao->beginTransaction();

        try {
            if ($parametros != null) {
                $gest = $ligacao->prepare($query);
                $gest->execute($parametros);
            } else {
                $gest = $ligacao->prepare($query);
                $gest->execute();
            }
            $ligacao->commit();
        } catch (PDOException $e) {
            
            $ligacao->rollBack();
        }
        $ligacao = null;
    }

}
