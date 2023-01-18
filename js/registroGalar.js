

$(document).ready(()=>{
    const validar=new JustValidate("#formRegistroGar",{
        tooltip:{position:"bottom"}
        
    });
    
    validar
        .addField("#clave",[
            {rule:"required",errorMessage:"Falta llenar la clave"}
        ])
        .addField("#nombre",[
            {rule:"required",errorMessage:"Falta llenar el nombre"}
        ])
        .addField("#apellidoP",[
            {rule:"required",errorMessage:"Falta llena el campo"}
        ])
        .addField("#area",[
            {rule:"required",errorMessage:"Falta seleccionar el campo"}
        ])
        .addField("#unidad",[
            {rule:"required",errorMessage:"Falta seleccionar el campo"}
        ])
        .addField("#galardon",[
            {rule:"required",errorMessage:"Falta seleccionar el campo"}
        ])
        .onSuccess((e)=>{
            e.preventDefault();
            $.ajax({
                url:"/php/administrador/registroGalarBD.php",
                method:"POST",
                data:$("#formRegistroGar").serialize(),
                cache:false,
                success:(respServ)=>{
                   console.log(respServ);
                   var resp=JSON.parse(respServ);
                   if(resp.cod==0){
                    var div=document.querySelector(".Mensaje");
                    div.innerHTML="<div class='alert alert-danger'>Datos incorrectos</div>";
                   }
                   else if (resp.cod==2){
                    var div=document.querySelector(".Mensaje");
                    div.innerHTML="<div class='alert alert-warning'>Clave repetida</div>";
                   }
                   else{
                    var div=document.querySelector(".Mensaje");
                    div.innerHTML="<div class='alert alert-success'>Se ha registrado correctamente</div>";
                   }
                }
            });
        });
    })
