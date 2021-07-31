$(document).ready(function(){
    $(".isStudent").hide();
    $(".userinfo").hide();
    $("#clearance").change(function(){
        if($("#clearance option:selected").text() == "Student"){
            $("#small").html("Do you want to <a href='createClass.php'>Create a Class</a> instead?");
            $(".isStudent").show();
        }
        else{
            $("#small").html("");
            $(".isStudent").hide();
        }
    });
    
    $("#username").focusin(function(){
        $(".userinfo").show();
    });
    $("#username").focusout(function(){
        $(".userinfo").hide();
    });
    
    
    
});