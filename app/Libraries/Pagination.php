<?php
    namespace App\Libraries;
    class Pagination{
        // SE PIDE COMO PARAMETRO DATO, PAGINA ACTUAL Y EL INTERVALO
        public static function getPages(int $data = 0, int $actualPage = 1, int $interval = 5) :array {
        //  APLICANDO SEGURIDAD DE DATOS Y LA IYECCION SQL 
            $interval = htmlentities(addslashes($interval)) ;
            $actualPage = htmlentities(addslashes($actualPage)) ;
            if($actualPage == 0){$actualPage = 1;}

        //  CALCULO DE LOS DATOS A MOSTRAR
            $startData  = (($actualPage - 1) * $interval);

        // PREPARANDO LAS VARIABLE, NUMERACION PARA LA PAGINACION
            $pages = [
                'numPages'      => ceil($data / $interval),
                'startData'     => $startData,
                'endData'       => $interval,

                'nextPage'      => $actualPage + 1,
                'prevPage'      => $actualPage - 1,
                'actualPage'    => $actualPage
            ];
        //  RETORNANDO UN ARRAY CONTODO LOS PARAMETRO DE LA PAGINACION 
            return $pages;
        }
    }
