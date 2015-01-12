<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Flexigrid</title>
        <link rel="stylesheet" href="Flexigrid/grid/style.css" />
        <link rel="stylesheet" type="text/css" href="Flexigrid/css/flexigrid.pack.css" />
        <script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="Flexigrid/js/flexigrid.pack.js"></script>
    </head>
    <body>





        <h1>Lista de Registro</h1>
        </br></br>

        <table class="flexme4" style="display: none"></table>




        <script type="text/javascript">



            function test(com, grid) {
                if (com == 'Delete') {
                    confirm('Delete ' + $('.trSelected', grid).length + ' items?')
                } else if (com == 'Add') {
                    alert('Add New Item');
                }
            }

            $(".flexme4").flexigrid({
                url : 'Flexigrid/grid/post.php',
                dataType : 'json',
                colModel : [ {
                    display : 'Numero',
                    name : 'number',
                    width : 90,
                    sortable : true,
                    align : 'center'
                    }, {
                        display : 'N° Vehiculos',
                        name : 'no_vehiculo',
                        width : 120,
                        sortable : true,
                        align : 'left'
                    }, {
                        display : 'Zona',
                        name : 'zona',
                        width : 120,
                        sortable : true,
                        align : 'left'
                    }, {
                        display : 'Carretera',
                        name : 'carretera',
                        width : 80,
                        sortable : true,
                        align : 'left',
                        hide : true
                    }, {
                        display : 'Km',
                        name : 'km',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Denominacion',
                        name : 'denominacion',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Sentido',
                        name : 'sentido',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Luminosidad',
                        name : 'luminosidad',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Tipo de accidente',
                        name : 'tipo_accidente',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Tipo de accidente',
                        name : 'tipo_accidente2',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Nombre Peaton',
                        name : 'nombre_peaton',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Apellido Peaton',
                        name : 'apellido_peaton',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Direccion',
                        name : 'direccion_peaton',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Sexo',
                        name : 'sexo_peaton',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Responsable?',
                        name : 'responsable_peaton',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Matricula',
                        name : 'matricula',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Marca',
                        name : 'marca',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Modelo',
                        name : 'modelo',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'No Ocupantes',
                        name : 'no_ocupantes',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'SOAT?',
                        name : 'soat',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Compañia Aseguradora',
                        name : 'compania_aseguradora',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'No Poliza',
                        name : 'no_poliza',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Nombre Conductor',
                        name : 'nombre_conductor',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Apellido Conductor',
                        name : 'apellido_conductor',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Sexo',
                        name : 'sexo_conductor',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Clase Permiso',
                        name : 'clase_permiso',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }, {
                        display : 'Responsable?',
                        name : 'responsable_conductor',
                        width : 80,
                        sortable : true,
                        align : 'right'
                    }
                ],
                sortname : "iso",
                sortorder : "asc",
                usepager : true,
                title : 'Registros de incidencia',
                useRp : true,
                rp : 15,
                showTableToggleBtn : true,
                width : 1300,
                height : 500
            });

            function Example4(com, grid) {
                if (com == 'Delete') {
                    var conf = confirm('Delete ' + $('.trSelected', grid).length + ' items?')
                    if(conf){
                        $.each($('.trSelected', grid),
                            function(key, value){
                                $.get('Flexigrid/demo/example4.php', { Delete: value.firstChild.innerText}
                                    , function(){
                                        // when ajax returns (callback), update the grid to refresh the data
                                        $(".flexme4").flexReload();
                                });
                        });    
                    }
                }
                else if (com == 'Edit') {
                    var conf = confirm('Edit ' + $('.trSelected', grid).length + ' items?')
                    if(conf){
                        $.each($('.trSelected', grid),
                            function(key, value){
                                // collect the data
                                var OrgEmpID = value.children[0].innerText; // in case we're changing the key
                                var EmpID = prompt("Please enter the New Employee ID",value.children[0].innerText);
                                var Name = prompt("Please enter the Employee Name",value.children[1].innerText);
                                var PrimaryLanguage = prompt("Please enter the Employee's Primary Language",value.children[2].innerText);
                                var FavoriteColor = prompt("Please enter the Employee's Favorite Color",value.children[3].innerText);
                                var FavoriteAnimal = prompt("Please enter the Employee's Favorite Animal",value.children[4].innerText);

                                // call the ajax to save the data to the session
                                $.get('Flexigrid/demo/example4.php',
                                    { Edit: true
                                        , OrgEmpID: OrgEmpID
                                        , EmpID: EmpID
                                        , Name: Name
                                        , PrimaryLanguage: PrimaryLanguage
                                        , FavoriteColor: FavoriteColor
                                        , FavoritePet: FavoriteAnimal  }
                                    , function(){
                                        // when ajax returns (callback), update the grid to refresh the data
                                        $(".flexme4").flexReload();
                                });
                        });    
                    }
                }
                else if (com == 'Add') {
                    // collect the data
                    var EmpID = prompt("Please enter the Employee ID","5");
                    var Name = prompt("Please enter the Employee Name","Mark");
                    var PrimaryLanguage = prompt("Please enter the Employee's Primary Language","php");
                    var FavoriteColor = prompt("Please enter the Employee's Favorite Color","Tan");
                    var FavoriteAnimal = prompt("Please enter the Employee's Favorite Animal","Dog");

                    // call the ajax to save the data to the session
                    $.get('Flexigrid/demo/example4.php', { Add: true, EmpID: EmpID, Name: Name, PrimaryLanguage: PrimaryLanguage, FavoriteColor: FavoriteColor, FavoritePet: FavoriteAnimal  }
                        , function(){
                            // when ajax returns (callback), update the grid to refresh the data
                            $(".flexme4").flexReload();
                    });
                }
            }
        </script>
    </body>
</html>