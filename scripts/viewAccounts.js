$(document).ready(function(){
    
    $(".deletebtn").click(function(){
        var username = $(this).attr("id")
        if(confirm("Do you want to delete "+ username +" account?")){
            $.post("deleteAccount.php",{username:username},function(data){
                console.log(data);    
                window.location.href = "viewAccounts.php";
            });
            console.log("deleted");
        }
    })
    
    
});