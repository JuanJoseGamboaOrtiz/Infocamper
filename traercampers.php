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
                $text=$campers1[$_GET['existe']-1][$info];
                echo $text;
            }
        }