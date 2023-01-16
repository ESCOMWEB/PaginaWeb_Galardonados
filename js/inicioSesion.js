$(document).ready(()=>{
    const validar=new JustValidate("#inicioSesion",{
        tooltip:{position:"bottom"}
    });

    validar
        .addField("#usuario",[
            {rule:"required",errorMessage:"Falta llenar el campo"}
        ])
        .addField("#contraseña",[
            {rule:"required",errorMessage:"Falta llenar el campo"}
        ])

        .onSuccess((e)=>{
            e.preventDefault();
            $.ajax({
                url:"/php/sinPagina/inicioSesion.php",
                method:"POST",
                data:$("#inicioSesion").serialize(),
                cache:false,
                success:(respServ)=>{
                    console.log(respServ);
                    var resp=JSON.parse(respServ);
                    if(resp.cod==0){
                        var div =document.querySelector(".Mensaje");
                        div.innerHTML="<div class='alert alert-danger'>Usuario y/o contraseña incorrectos</div>";
                    }
                    else if(resp.cod==1){
                        window.location.href="./../php/administrador/principalAdmin.php";
                    }
                    else if(resp.cod==2){
                        window.location.href="./../php/director/principalDirector.php";
                    }
                    else if(resp.cod==3){
                        window.location.href="./../php/galardonados/principalGal.php";
                    }
                    
                }
            });
        });

})