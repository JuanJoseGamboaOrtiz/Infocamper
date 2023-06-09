<?php
        include('traercampers.php');

        if (isset($_POST['agregar'])){
            $data=[
                'nombre'=> $_POST['nombre'],
                'apellidos'=> $_POST['apellido'],
                'direccion'=> $_POST['direccion'],
                'edad'=>$_POST['edad'],
                'email'=>$_POST['email'],
                'horae'=>$_POST['horae'],
                'team'=>$_POST['team'],
                'trainer'=>$_POST['trainer'],
                'cc'=>$_POST['cedula']

            ];
            $config = [
                'http' => [
                    'method' => 'POST',
                    'header' =>'Content-Type: application/json',
                    'content' => json_encode($data)
            ]
            ];

            $config= stream_context_create($config);
            $_DATA= file_get_contents('https://6480f4b2f061e6ec4d4a1e27.mockapi.io/campers',false,$config);
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }

?>


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
    <form method="POST">
        <div class="primera">
        <input type="text" placeholder="Nombre" name="nombre"  value="<?php subirDatos('nombre',$campers);?>" >
        <h1>CampusLands</h1>
        <input type="text" placeholder="Apellido" name="apellido" value= "<?php subirDatos('apellidos',$campers);?>" >
        <input type="text" placeholder="Direccion" name="direccion"  value="<?php subirDatos('direccion',$campers);?>" >
        <input type="number" placeholder="Edad" name="edad" value="<?php subirDatos('edad',$campers);?>" >
        <input type="email" placeholder="Email" name="email" value="<?php echo subirDatos('email',$campers);?>"  >
        </div>
        <div class="segunda">
            <div class="inputs">
                <input type="time"  name="horae" value= "<?php subirDatos('horae',$campers);?>" >
                <input type="text" placeholder="Team" name="team" value="<?php subirDatos('team',$campers);?>" >  
                <input type="text" placeholder="Trainer" name="trainer" value="<?php subirDatos('trainer',$campers);?>" >
            </div>
            <div class="botones">
                <div class="campo">
                    <button type="submit" name="agregar"> <i class="fa-solid fa-check"></i></button>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="campo">
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <input type="text"  name="cedula" placeholder="Cedula" value=<?php subirDatos('cc',$campers);?> >
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
            if (isset($campers)) {
                foreach ($campers as $camper) {
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
                            <td><a href="subirdatos.php?id='. $camper['id'] .'"><i class="fa-solid fa-arrow-up"></i></a></td>
                        </tr>';
                }
            }
        ?>
    </table>
        
</body>
</html>