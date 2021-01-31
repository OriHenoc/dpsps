$(document).ready(function(){
$(document).on('click', '.btnedit', function(){

    var id_dossier = $(this).attr("id");
    
    $.ajax({
        url: "../queries/dossiers/traitementModif.php",
        method: "POST",
        data: {id_dossier:id_dossier},
        success:function(data){
            $(".affiche").html(data);
        }
    })
    
    
    });
    
    $(document).on('click', '#modifier_dossier', function(){
    
    $("#form_mod").submit();
    
    });
});