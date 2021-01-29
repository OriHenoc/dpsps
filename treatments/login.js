$(document).ready(function(){ 
       
    $("div.message_erreur").hide();

    $("#form_connexion").on('keyup',function(){ 
        
        $("#connexion").on('click',function(){ 

                var username=$("#username").val();
                var password=$("#password").val();

                    $.ajax({
                        type: "POST",
                        url: "auth/checkLogin.php",
                        data: {
                         username:username,
                         password:password,
                        },
        
                        success: function(msg){
                            if(msg=="erreur_param")
                            {
                                $("div.message_erreur").html("Paramètres d'identification incorrects !").show(500);
                            } 
                            else
                            {
                                if(msg=="erreur_valide")
                                {
                                    $("div.message_erreur").html("Compte suspendu ! <br>Contactez le service support pour plus d'informations.").show(500);
                                } 
                                else{
                                    if(msg=="connect"){
                                        $("div.message_erreur").hide(500);
                                        $(location).attr('href',"./");
                                    }
                                    
                                }
                            }
                        }
                     });
                
         return false;
         
        });
    });
    
});