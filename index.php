<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/14ddcf99c2.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="css/app.css">
    <title>InfoCamper</title>
</head>
<body>
    <form action="">
        <div class="primera">
        <input type="text" placeholder="Nombre" name="nombre">
        <h1>CampusLands</h1>
        <input type="text" placeholder="Apellido" name="apellido">
        <input type="text" placeholder="Direccion" name="direccion">
        <input type="number" placeholder="Edad" name="edad">
        <input type="email" placeholder="Email" name="email">
        </div>
        <div class="segunda">
            <div class="inputs">
                <input type="time"  name="hora">
                <input type="text" placeholder="Team" name="team">  
                <input type="text" placeholder="Trainer" name="trainer">
            </div>
            <div class="botones">
                <div class="campo">
                    <i class="fa-solid fa-check"></i>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="campo">
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input type="text"  name="cedula" placeholder="Cedula">
            </div>
        </div>
    </form>

    <table>
        <tr>
            <th>Nombres </th>
            <th>Apellidos </th>
            <th>Direccion</th>
            <th>Edad</th>
            <th>Email</th>
            <th>Horario de entrada</th>
            <th>Team</th>
            <th>Trainer</th>
            <th>Acción</th>
        </tr>
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
                $cont=0;
                $camperarray=urlencode(json_encode($campers[$cont]));
              echo '
                    <tr>
                        <td>' .$camper['nombre']. '</td>
                        <td>'.$camper['apellidos'].' </td>
                        <td>'.$camper['direccion'].'</td>
                        <td>'.$camper['edad'].'</td>
                        <td>'.$camper['email'].'</td>
                        <td>'.$camper['horae'].'</td>
                        <td>'.$camper['team'].'</td>
                        <td>'.$camper['trainer'].'</td>
                        <td><a href="subirdatos.php?id='. $camperarray.'">Prueba</a></td>
                    </tr>';
                $cont+=1;
            }
            }
        ?>
</body>
</html>