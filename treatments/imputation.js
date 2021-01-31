$(document).ready(function(){

    // SD
    $('#imputation_sd_dos').change(function(){
    
       var sdid = $(this).val();
    
       // vide SERVICES et AGENTS
       $('#imputation_service_dos').find('option').not(':first').remove();
       $('#imputation_agent_dos').find('option').not(':first').remove();
    
       $.ajax({
         url: 'imputations.php',
         type: 'POST',
         data: {request: 1, sdid: sdid},
         dataType: 'JSON',
         success: function(response){
           var len = response.length;
    
           for( var i = 0; i<len; i++){
             var id = response[i]['id_service'];
             var name = response[i]['libelle_service'];
    
             $("#imputation_service_dos").append("<option value='"+id+"'>"+name+"</option>");
    
           }
         }
       });
    
    });
    
    // SERVICES
    $('#imputation_service_dos').change(function(){
       var servid = $(this).val();
    
       // Vide AGENT
       $('#imputation_agent_dos').find('option').not(':first').remove();
    
       $.ajax({
         url: 'imputations.php',
         type: 'POST',
         data: {request: 2, servid: servid},
         dataType: 'JSON',
         success: function(response){
    
           var len = response.length;
    
           for( var i = 0; i<len; i++){
             var id = response[i]['id_user'];
             var name = response[i]['fullname_user'];
    
             $("#imputation_agent_dos").append("<option value='"+id+"'>"+name+"</option>");
    
           }
         }
       });
     });
    });