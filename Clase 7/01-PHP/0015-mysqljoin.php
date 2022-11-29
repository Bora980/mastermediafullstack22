<style>
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;}
    
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
</style>
<table>
    <tr>
        <th>usuario del alumno</th>
        <th>nombre del alumno</th>
        <th>curso matriculado</th>
        
    </tr>
<?php
    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "lms", "lms", "lms");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = "
        SELECT 
        lmsusuarios.usuario AS 'usuario del alumno',
        lmsusuarios.nombre AS 'nombre del alumno',
        lmscursos.nombre AS 'nombre del curso'
        FROM `lmsmatriculas` 

        LEFT JOIN lmsusuarios
        ON lmsmatriculas.FK_lmsusuarios_usuario = lmsusuarios.Identificador

        LEFT JOIN lmscursos
        ON lmsmatriculas.FK_lmscursos_nombre = lmscursos.Identificador

    ";
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    $result = mysqli_query($mysqli, $query);
    // Ahora quiero obtener los usuarios en pantalla en forma de tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td>'.$row['usuario del alumno'].'</td>
                <td>'.$row['nombre del alumno'].'</td>
                <td>'.$row['nombre del curso'].'</td> 
            </tr>
        ';
    }

?>
</table>