$(document).ready(function(){
    $(".deploy").hide();
    $(".test").click(function(){
        var testid = $(this).attr("id");
            $("."+testid).toggle();
    });
    
});