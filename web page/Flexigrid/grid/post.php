<?php

    session_start();
include("../../DB/mysql.class.php");
$db = new MySQL(true, "policia", "localhost", "root", "");
    $db->Query("SELECT * FROM formulario");
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
    $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
    $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
    $query = isset($_POST['query']) ? $_POST['query'] : false;
    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;


    if(isset($_GET['Add'])){ // this is for adding records

        $rows = $_SESSION['Example4'];
        $rows[$_GET['EmpID']] = 
        array(
            'name'=>$_GET['Name']
            , 'favorite_color'=>$_GET['FavoriteColor']
            , 'favorite_pet'=>$_GET['FavoritePet']
            , 'primary_language'=>$_GET['PrimaryLanguage']
        );
        $_SESSION['Example4'] = $rows;

    }
    elseif(isset($_GET['Edit'])){ // this is for Editing records
        $rows = $_SESSION['Example4'];
        unset($rows[trim($_GET['OrgEmpID'])]);  // just delete the original entry and add.
        
        $rows[$_GET['EmpID']] = 
        array(
            'name'=>$_GET['Name']
            , 'favorite_color'=>$_GET['FavoriteColor']
            , 'favorite_pet'=>$_GET['FavoritePet']
            , 'primary_language'=>$_GET['PrimaryLanguage']
        );
        $_SESSION['Example4'] = $rows;
    }
    elseif(isset($_GET['Delete'])){ // this is for removing records
        $rows = $_SESSION['Example4'];
        unset($rows[trim($_GET['Delete'])]);  // to remove the \n
        $_SESSION['Example4'] = $rows;
    }
    else{
            $request="";
//        if(isset($_SESSION['Example4'])){ // get session if there is one
//            $rows = $_SESSION['Example4'];
//        }
//        else{

            for ($index = 0; $index < $db->RowCount(); $index++) {
                $requests = $db->Row($index);
                $rows[$index+1] = array(
                    'no_vehiculo'=>$requests->no_vehiculo,
                    'zona'=>$requests->zona,
                    'carretera'=>$requests->carretera,
                    'km'=>$requests->km,
                    'denominacion'=>$requests->denominacion,
                    'sentido'=>$requests->sentido,
                    'luminosidad'=>$requests->luminosidad,
                    'tipo_accidente'=>$requests->tipo_accidente,
                    'tipo_accidente2'=>$requests->tipo_accidente2,
                    'nombre_peaton'=>$requests->nombre_peaton,
                    'apellido_peaton'=>$requests->apellido_peaton,
                    'direccion_peaton'=>$requests->direccion_peaton,
                    'sexo_peaton'=>$requests->sexo_peaton,
                    'responsable_peaton'=>$requests->responsable_peaton,
                    'matricula'=>$requests->matricula,
                    'marca'=>$requests->marca,
                    'modelo'=>$requests->modelo,
                    'no_ocupantes'=>$requests->no_ocupantes,
                    'soat'=>$requests->soat,
                    'compania_aseguradora'=>$requests->compania_aseguradora,
                    'no_poliza'=>$requests->no_poliza,
                    'nombre_conductor'=>$requests->nombre_conductor,
                    'apellido_conductor'=>$requests->apellido_conductor,
                    'sexo_conductor'=>$requests->sexo_conductor,
                    'clase_permiso'=>$requests->clase_permiso,
                    'responsable_conductor'=>$requests->responsable_conductor
                );

            }
//        }



        header("Content-type: application/json");
        $jsonData = array('page'=>$page,'total'=>0,'rows'=>array());
        foreach($rows AS $rowNum => $row){
            //If cell's elements have named keys, they must match column names
            //Only cell's with named keys and matching columns are order independent.
            $entry = array('id' => $rowNum,
                'cell'=>array(
                    'number'       => $rowNum,
                    'no_vehiculo'      => $row['no_vehiculo'],
                    'zona' => $row['zona'],
                    'carretera'   => $row['carretera'],
                    'km'     => $row['km'],
                    'denominacion'     => $row['denominacion'],
                    'sentido'     => $row['sentido'],
                    'luminosidad'     => $row['luminosidad'],
                    'tipo_accidente'     => $row['tipo_accidente'],
                    'tipo_accidente2'     => $row['tipo_accidente2'],
                    'nombre_peaton'     => $row['nombre_peaton'],
                    'apellido_peaton'     => $row['apellido_peaton'],
                    'direccion_peaton'     => $row['direccion_peaton'],
                    'sexo_peaton'     => $row['sexo_peaton'],
                    'responsable_peaton'     => $row['responsable_peaton'],
                    'matricula'     => $row['matricula'],
                    'marca'     => $row['marca'],
                    'modelo'     => $row['modelo'],
                    'no_ocupantes'     => $row['no_ocupantes'],
                    'soat'     => $row['soat'],
                    'compania_aseguradora'     => $row['compania_aseguradora'],
                    'no_poliza'     => $row['no_poliza'],
                    'nombre_conductor'     => $row['nombre_conductor'],
                    'apellido_conductor'     => $row['apellido_conductor'],
                    'sexo_conductor'     => $row['sexo_conductor'],
                    'clase_permiso'     => $row['clase_permiso'],
                    'responsable_conductor'     => $row['responsable_conductor'],
                )
            );
            $jsonData['rows'][] = $entry;
        }
        $jsonData['total'] = count($rows);
        echo json_encode($jsonData);

}