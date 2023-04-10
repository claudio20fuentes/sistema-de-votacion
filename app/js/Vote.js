$(document).ready(function(){

    //RECARGAR combo box REGION Y COMUNA AL INICIAR

  var id = $("#region").val();

  $.ajax({
    url: 'controller/voteController.php',
    type: "POST",
    data: { id : id },
    success: function(response) {

        let objeto_json = $.parseJSON(response);

        objeto_json.forEach(function(elemento){
            let cod = elemento.cod;
            let nombre_comuna = elemento.nombre_comuna;
            $('#comuna').append('<option value = "'+ cod +'">'+nombre_comuna+'</option>');
        });
    }
});


//Cargar select comuna al cambiar la seleccion de region

        $("#region").change(function() {
           
            var id = $("#region").val();

            $.ajax({
                url: 'controller/voteController.php',
                type: "POST",
                data: { id : id },
                success: function(response) {

                    let objeto_json = $.parseJSON(response);
                    $('#comuna').empty();

                    objeto_json.forEach(function(elemento){
                        let cod = elemento.cod;
                        let nombre_comuna = elemento.nombre_comuna;

                        $('#comuna').append('<option value = "'+ cod +'">'+nombre_comuna+'</option>');
                
                    });
                }
            });
        });
        

//Crear registro, validar formularios

			$("#btnGuardar").click(function(){

                $('form').submit(function(e) {
                    e.preventDefault();
                });

                var tv = 0;
                var web = 0;
                var redSocial = 0;
                var amigo = 0;

                var opciones = 0;

                if ($('#tv').prop('checked')) {
                    tv = 1;
                    opciones += 1;
                } 
                if ($('#web').prop('checked')) {
                    web = 1;    
                    opciones += 1;
                } 
                if ($('#redSocial').prop('checked')) {
                    redSocial = 1;  
                    opciones += 1;
                    } 
                if ($('#amigo').prop('checked')) {
                    amigo = 1;
                    opciones += 1;
                    } 

                var nombre = $("#nombre").val();
                var alias = $("#alias").val();
                var correo = $("#email").val();
                var region = $("#region").val();
                var candidato = $("#candidato").val();
                
                if (aliasLength(alias)==false) {
                    $("#alias").val("");
                }

                if (Fn.validaRut( $("#rut").val())){
                    var rut = $("#rut").val();
                }else{
                    alert("El formato del rut solo debe contener digito verificador ejemplo: xxxxxxxx-x")
                    $("#rut").val("");
                }

                if (!isValidEmail(correo)) {
                    alert('Por favor, introduce un email válido.');
                  }

                if (opciones < 2) {
                    alert("En la consulta ¿Cómo se entero de nosotros?, debe seleccionar mas de 2 opciones");
                }

                if (nombre != "" && alias != "" && rut != "" && correo != "" && region != "" && candidato != "" && opciones >= 2) {
                        
                    var datos = {"rut": rut,"nombre": nombre, "alias": alias,"correo": correo,"region": region,"candidato": candidato,"tv": tv,"web": web,"redSocial": redSocial,"amigo": amigo};
        
                    $.ajax({
                        url: "controller/voteController.php",
                        type: "POST",
                        data: datos,
                        success: function(response){
                            
                            alert(response);

                        }
                    });
                    var nombre = $("#nombre").val("");
                    var alias = $("#alias").val("");
                    var correo = $("#email").val("");
                    var region = $("#rut").val("");
                    $('input[type="checkbox"]').prop('checked', false);

                }
			});

            var Fn = {
                // Valida el rut con su cadena completa "XXXXXXXX-X"
                validaRut : function (rutCompleto) {
                    rutCompleto = rutCompleto.replace("‐","-");
                    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                        return false;
                    var tmp 	= rutCompleto.split('-');
                    var digv	= tmp[1]; 
                    var rut 	= tmp[0];
                    if ( digv == 'K' ) digv = 'k' ;
                    
                    return (Fn.dv(rut) == digv );
                },
                dv : function(T){
                    var M=0,S=1;
                    for(;T;T=Math.floor(T/10))
                        S=(S+T%10*(9-M++%6))%11;
                    return S?S-1:'k';
                }
            }
    });

    //valida el input Alias, minimo 5 caracteres, letras y numeros.
    function aliasLength(aliasCount){

        if(/^(?=.*[a-zA-Z])(?=.*\d).+$/.test(aliasCount) && aliasCount.length > 5){
            return true;
        }else{
            alert("El alias debe contener al menos una letra y un numero, debe contener mas de 5 caracteres");
            return false;
        }
    }

    //Valida formnato de correo
    function isValidEmail(email) {
        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return pattern.test(email);
      }


