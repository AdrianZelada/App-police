/**
 * Created by Zelada_Torrez on 22-07-14.
 */
$(document).on('ready',function(){
    var formtext=['Numero de Vehiculos','Zona','Carretera','Kilometros','Denominaciones',
        'Sentido','Luminosidad','Tipo Accidente 1','Tipo Accidente 2', 'Nombre Peaton',
        'Apellido Peaton','Direccion Peaton ','Sexo Peaton','Responsable','Matricula',
        'Marca','Modelo','Ocupantes','Seguro Social','Compania Aseguradora','N° Poliza',
        'Nombre Conductor','Apellido Conductor','Sexo Conductor','Permiso Conducir','Responsable'];
    var i=0;
    var ind=0;
    var object={};
    var t;
    var inform;
    var dataUser={
        name:'',
        codig:'',
        email:'',
        direccion:''
     };
    var formSends={};    
    if(localStorage.getItem("NomUsuario")||localStorage.getItem("CodUsuario")||localStorage.getItem("EmailUsuario")){
        $('#NomUsuario').val(localStorage.getItem("NomUsuario"));
        $('#CodUsuario').val(localStorage.getItem("CodUsuario"));
        $('#EmailUsuario').val(localStorage.getItem("EmailUsuario"));        
        $('#Direccion').val(localStorage.getItem("Direccion"));      
    }
   $('#postJson').click(function(){
       objectfill();
        fill(inform);
   });
   $('#fo').click(function(){
       objectfill();
       fill(inform);
   });
    $('#save').click(function(){        
        dataUser.name=$('#NomUsuario').val();
        dataUser.codig=$('#CodUsuario').val();
        dataUser.email=$('#EmailUsuario').val();
        datauser.direccion=$('#Direccion').val();
        
        localStorage.setItem('NomUsuario',dataUser.name);
        localStorage.setItem('CodUsuario',dataUser.codig);
        localStorage.setItem('EmailUsuario',dataUser.email);  
        localStorage.setItem('Direccion',dataUser.direccion);
    });
    $('#Send').click(function(){        
        var ob={
            'ht':t,
            'name':$('#NomUsuario').val(),
            'codigo':$('#CodUsuario').val(),
            'email':$('#EmailUsuario').val(),
            'datos':inform
        }                
        jQuery.support.cors=true;
        $.ajax({
            type:'POST',            
            url: $('#Direccion').val() ,
            dataType: 'jsonp',
            crossDomain: true,
            data: ob,
            success: function(data) {
                console.log('enviado');
            },
            error: function(jqxhr,tstatus,ex) {
                console.log(tstatus+ ','+ ex +', '+jqxhr.responseText);
            }
        });
        
        if(localStorage.getItem('ind')>0){            
            ind=localStorage.getItem('ind');            
            ind++;
            var title ="form"+ind;
            localStorage.setItem('ind',ind);            
            Storage.prototype.setObject = function(title, inform) {
                this.setItem(title, JSON.stringify(inform));
            }
     
            Storage.prototype.getObject = function(title) {
                var value = this.getItem(title);
                return value && JSON.parse(value);
            } 
            localStorage.setObject(title,inform);                        
        }else{                        
            ind++;
            var title ="form"+ind;            
            localStorage.setItem('ind',ind);                        
            Storage.prototype.setObject = function(title, inform) {
                this.setItem(title, JSON.stringify(inform));
            }
     
            Storage.prototype.getObject = function(title) {
                var value = this.getItem(title);
                return value && JSON.parse(value);
            }
            localStorage.setObject(title,inform)            
        }                
        
    });            
    
    
    $('#sends').click(function(){
        $('#ContentSend').children().remove();        
        var ind=localStorage.getItem('ind');         
        var form;
        for(i=1;i<=ind;i++){             
        	Storage.prototype.getObject = function(title) {
                var value = this.getItem(title);
                return value && JSON.parse(value);
            }    
            form=localStorage.getObject("form"+i);                         
            /*if(form.nombre_conductor=""){
                form.nombre_conductor="desconocido";
            }*/            
            var aux=objectForm(form);
        	$('#ContentSend').append(aux);
        }        
    });    
    /*$('#cancel').click(function(){
        localStorage.clear();
        ind=0;
    });*/
    
    objectForm=function(object){
        var a=$('<a>',{href:'#formulario'});
        var b=$('<button>',{class:'ui-btn ui-shadow ui-corner-all'}).text(object.nombre_conductor);        
        a.click(function(){
           fill(object) 
        });
        a.append(b);
        return a;
    }
    function objectfill(){
        inform={
           'no_vehiculo':$('#Nvehiculo').val(),
           'zona':$('#select-choice-0').val(),
           'carretera':$('#carretera').val(),
           'km':$('#kilometros').val(),
           'denominacion':$('#denominacion').val(),
           'sentido':$('#select-choice-1').val(),
           'luminosidad':$('#select-choice-2').val(),
           'tipo_accidente':$('input[name=tipoAc1]:checked').val(),
           'tipo_accidente2':$('input[name=tipoAc2]:checked').val(),
           'nombre_peaton':$('#Nombre').val(),
           'apellido_peaton':$('#Apellido').val(),
           'direccion_peaton':$('#Direccion').val(),
           'sexo_peaton':$('input[name=SexoPe]:checked').val(),
           'responsable_peaton':$('input[name=ResponsablePe]:checked').val(),
           'matricula':$('#Matricula').val(),
           'marca':$('#Marca').val(),
           'modelo':$('#Modelo').val(),
           'no_ocupantes':$('#Ocupantes').val(),
           'soat':$('input[name=SeguroOb]:checked').val(),
           'compania_aseguradora':$('#ComAseguradora').val(),
           'no_poliza':$('#Npoliza').val(),
           'nombre_conductor':$('#Cnombre').val(),
           'apellido_conductor':$('#Capellido').val(),
           'sexo_conductor':$('input[name=SexoCon]:checked').val(),
           'clase_permiso':$('#CPermiso').val(),
           'responsable_conductor':$('input[name=ResponsableCon]:checked').val()
       }
    }
    
   function fill(obj){

        i=0;
       object={};
      
       t='<table><tr><td>Pregunta</td><td>Respuesta</td></tr>';
       $form=$('#formu');
		$form.children().remove();
       $.each(obj,function(index,val){
           pr=$('<div class="ui-block-a"><div class="ui-bar ui-bar-a classGrid" style="height:50%" > '+formtext[i]+ '</div></div>');
           seg=$('<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:45%"> '+val+ '</div></div>');
           i++;
           $form.append(pr);
           $form.append(seg);
           t=t+'<tr><td>'+formtext[i]+'</td><td> '+val+' </td></tr>';           
       });
       t=t+'</table>'
       $('#Nvehiculo').val("");
       $('#carretera').val("");
       $('#kilometros').val("");
       $('#denominacion').val("");
       $('#Nombre').val("");
       $('#Apellido').val("");
       $('#Direccion').val("");
       $('#Matricula').val("");
       $('#Marca').val("");
       $('#Modelo').val("");
       $('#Ocupantes').val("");
       $('#ComAseguradora').val("");
       $('#Npoliza').val("");
       $('#Cnombre').val("");
       $('#Capellido').val("");
       $('#CPermiso').val("");
   }
});
