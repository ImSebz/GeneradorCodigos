<?php
    set_time_limit(100000);

    for ($i = 0; $i < 1000; $i++) {
        $codigo = claveThree();
        if (
            strpos($codigo, '0o') !== false || strpos($codigo, 'o0') !== false ||
            strpos($codigo, 'il') !== false || strpos($codigo, 'll') !== false ||
            strpos($codigo, 'ii') !== false || strpos($codigo, 'Ii') !== false ||
            strpos($codigo, '1i') !== false || strpos($codigo, 'i1') !== false ||
            strpos($codigo, 'Oo') !== false ||  strpos($codigo, 'oO') !== false ||
            strpos($codigo, 'OO') !== false || strpos($codigo, 'I1') !== false ||
            strpos($codigo, 'O0') !== false || strpos($codigo, '0O') !== false ||
            strpos($codigo, 'IL') !== false || strpos($codigo, 'LL') !== false ||
            strpos($codigo, '1I') !== false || strpos($codigo, 'oo') !== false ||
            strpos($codigo, 'iL') !== false || strpos($codigo, 'iL') !== false ||
            strpos($codigo, 'Il') !== false || strpos($codigo, 'Li') !== false ||
            strpos($codigo, 'li') !== false || strpos($codigo, 'lI') !== false ||
            strpos($codigo, 'LI') !== false || strpos($codigo, '1L') !== false ||
            strpos($codigo, '1l') !== false || strpos($codigo, 'l1') !== false ||
            strpos($codigo, '1l') !== false || strpos($codigo, 'l1') !== false ||
            strpos($codigo, 'G6') !== false || strpos($codigo, 'G6') !== false ||
            strpos($codigo, 'L1') !== false) {
        } else {
            // echo "$i: ".$codigo;
            insert($codigo);
        }
        $codigo = '';
    }

    echo "Registros almacenados: $i";

    /*
    * Clave aleatoria
    */
    function claveThree($length = 6) { 
        return "TD" . substr(str_shuffle("JKRMGNTFX234568"), 0, $length); //0JO L minuscula, O mayuscula, 0 cero, I mayuscula, 1 uno - contatenar con lo necesa
    }

    function insert ($codigo){ 
        try {
            require "connectionn.php";
            $sql = "INSERT IGNORE INTO codigos (codigo, referencia_id, estado_id, tipo_id) VALUES ('".$codigo."', '6', '1', '2')";
            // use exec() because no results are returned
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>