$(function () {
    $("#tab").DataTable();
    $("#bloc1").show();
    $("#bloc2").hide();
    $("#bloc3").hide();
    /**
     * Event click
     * 
     * Show bloc1 : Etudiant
     */
    $("#etudiant").click(function () {
        $("#bloc1").show(200);
        $("#bloc2").hide();
        $("#bloc3").hide();
    });
    /**
     * 
     * Event click
     * 
     * Show bloc2 : Cours
     */
    $("#cours").click(function () {
        $("#bloc1").hide();
        $("#bloc2").show(200);
        $("#bloc3").hide();
    });
    
    $("#optionSuple").click(function (){
        $("#bloc3").show(200);
        $("#bloc2").hide();
        $("#bloc1").hide();
    })
});