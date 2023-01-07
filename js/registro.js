$(document).ready(()=>{
    const validar=new JustValidate("#formRegistro",{
        tooltip:{position:"bottom"}
    });

    validar 
        .addField("#clave",[
            {rule:"required",errorMessage:"Falta llenar la clave"}
        ])
        .addField("#email",[
            {rule:"required",errorMessage:"Falta llevar el correo electronico"}
        ])
        .onSuccess((e)=>{
            e.preventDefault();
            $.ajax({
            
            success:(respServ)=>{
                
            }
            });
        });
})
