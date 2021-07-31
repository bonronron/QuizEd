$(document).ready(function(){
    var i = 1;//timer in seconds
    var timelimit = $("#testtime").val()*60;
    console.log(timelimit);
    var getResult = function (){
        var selectoptions = []
        $(".question").each(function(){
            if($(this).find(".option:checked")){
                selectoptions.push($(this).find(".option:checked").attr("value"))
            };
        });
        return selectoptions;
    }
    $("#btnsubmit").click(function(){
        var selectoptions = getResult();
        $.post("checkTest.php",{selectedoptions : selectoptions ,test_id: $('#testid').val(),student:$('#user').val()},function(data,status,jq) {
        console.log(data)
        window.location.href= "home.php"});
        console.log("submitted")
    });
    setInterval(function () {
            i++;
            if (i == timelimit){
                var selectoptions = getResult();
                $.post("checkTest.php",{selectedoptions : selectoptions ,test_id: $('#testid').val(),student:$('#user').val()},function(data,status,jq) {
                console.log(data)
                window.location.href= "home.php"});
                console.log("submitted")

                //Post to site
            };
        }, 1000);   
    
    
});
