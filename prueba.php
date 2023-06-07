<?php
           

        $config = [
            'http' => [
                'method' => 'GET'
            ]
        ];

        $stream= stream_context_create($config);

        $campers = file_get_contents('https://6480f4b2f061e6ec4d4a1e27.mockapi.io/campers', false, $stream);
        $campers = json_decode($campers,true);

        if (isset($campers)) {
            foreach ($campers as $camper) {
              echo '<tr>
                    <td>' .$camper['nombre']. '</td>
                    <td>'.$camper['apellidos'].' </td>
                    <td>'.$camper['direccion'].'</td>
                    <td>'.$camper['edad'].'</td>
                    <td>'.$camper['email'].'</td>
                    <td>'.$camper['horae'].'</td>
                    <td>'.$camper['team'].'</td>
                    <td>'.$camper['trainer'].'</td>
                </tr>';
            }
            }
?>