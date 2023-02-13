<?php

require 'config.php'

$columns = ['ID','Nombre_completo','Fecha_de_nacimiento','Dirección',
'Localidad_y_Código_postal', 'Teléfono','Correo_electrónico',
'Fecha_de_alta','Grupo_de_clientes']


$table = "clientes";

$campo = isset ($_POST['campo']) ? $conn->real_escape_string ($_POST ['campo']): null;

$where = '';

if($campo !=null){
    $where = "WHERE (";

    $cont = count($columns);
    for($i=0;$i<$cont;$i++){
        $where .= $columns[$i] . "LIKE'%". $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$sql = "SELECT" . implode(", ", $columns).  "

FROM $table 
$where ";
echo $sql;
exit;

$resultado = $conn->query ($sql)
$num_rows = $resultado->num_rows;


$html = '';

if($num_rows > 0){
    while($row = $resultado->fetch_assoc())
        $html .= '<tr>';
        $html .= '<td>'.$row['ID'].'</td>';
        $html .= '<td>'.$row['Nombre_completo'].'</td>';
        $html .= '<td>'.$row['Fecha_de_nacimiento'].'</td>';
        $html .= '<td>'.$row['Dirección'].'</td>';
        $html .= '<td>'.$row['Localidad_y_Código_postal'].'</td>';
        $html .= '<td>'.$row['Teléfono'].'</td>';
        $html .= '<td>'.$row['Correo_electrónico'].'</td>';
        $html .= '<td>'.$row['Fecha_de_alta'].'</td>';
        $html .= '<td>'.$row['Grupo_de_clientes'].'</td>';
        $html .= '<td><a href="">Editar</a></td>';
        $html .= '<td><a href="">Eliminar</a></td>';
        $html .= '<tr>';

}else{
    $html .= '<tr>';
    $html .= '<td colspan="11">Sin resultados</td>';
    $html .= '</tr>';

}


echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>