<?php
        
        $config = [
            'http' => [
                'method' => 'GET'
        ]
        ];
        
        $stream= stream_context_create($config);

        $campers = file_get_contents('https://6480f4b2f061e6ec4d4a1e27.mockapi.io/campers', false, $stream);
        $campers = json_decode($campers,true);

        function subirDatos(string $info, array $campers1) {

            if( isset($_GET['existe'])){
                
                $camper=filtrar($campers1,"get");
                $camper=array_values($camper);
                $text=$camper[0][$info];
                print_r($text);   
            }
            if ( isset($_POST['buscar'])){
                $camper=filtrar($campers1,"post");
                $camper=array_values($camper);
                $text=$camper[0][$info];
                print_r($text);   
            }
        }

?>