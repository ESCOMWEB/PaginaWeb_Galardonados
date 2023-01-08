$(document).ready(()=>{
    const validar=new JustValidate("#formRegistro",{
        tooltip:{position:"bottom"}
    });

    validar
        .addField("#clave",[
            {rule:"required",errorMessage:"Falta llenar la clave"}
        ])
        .addField("#email",[
            {rule:"required",errorMessage:"Falta llevar el correo electronico"},
            {rule:"email",errorMessage:"Error de formato"}
        ])
        .onSuccess((e)=>{
            e.preventDefault();
            $.ajax({
                
                url:"/php/sinPagina/registroValDB.php",
                method:"POST",
                data:$("#formRegistro").serialize(),
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
                    div.innerHTML="<div class='alert alert-warning'>Ya ha sido registrado</div>";
                   }
                   else{
                    var div=document.querySelector(".Mensaje");
                    div.innerHTML="<div class='alert alert-success'>Felicitaciones, le hemos enviado un correo con su usuario y contraseña</div>";
                   }
                }
            });
        });
})
