$(document).ready(function(){
    var totalQ = 0;
    QuestionArray = [];
    var QuestionNum = -1;
    var testname = $('#testname').val();
    var testTime = $("#testtime").val();
    var testDesc = $("#testdesc").val();
    //adding new questions in left side 
    $('#btnaddQ').click(function(){ 
        totalQ +=1; //add totalQs to check Max of 20 
        if(totalQ<21){//check if Qs are less than max
            QuestionArray.push({question:"",answers:[],correctanswer:""});
            //add empty Questions to the array
            $('#allQs').append('<li id = "'+totalQ+'">Question ' + totalQ + '</li><br>');
            // display Question on left side
        }
        else{alert("Maximum Question limit reached");}
        //maximum Qs reached
    });
    
    
    //when user clicks a question on left side
    $('#allQs').on('click','li',function(){
        QuestionNum = parseInt(($(this).attr('id')));// get question number
        addoption = '';//initiating options string to add below
        for (var i = 0; i<(QuestionArray[QuestionNum-1].answers.length); i++){ 
            if(QuestionArray[QuestionNum-1].correctanswer ==  QuestionArray[QuestionNum-1].answers[i]){
                addoption+= '<br><input type = "radio" name = "options" class = "rboption" checked><input type = "text" value = "'+QuestionArray[QuestionNum-1].answers[i]+'"class = "options">';}
            else{
                addoption+= '<br><input type = "radio" name = "options" class = "rboption"><input type = text value = "'+QuestionArray[QuestionNum-1].answers[i]+'"class = "options">';
            }
        } // updating options string for adding below with all radioes
      $('#QuestionDisplay').html('<label>Question: </label><input type="textarea" class="questionname" value = "'+QuestionArray[QuestionNum-1].question+'"><br><label>Answers:</label><br><input class="btn btn-primary btn-sm" type="button" id = "btnAddO" value = "Add Options">'+addoption);
        //Update Question on display on right side   
    });
    
    
    //update Question in array
    $('#btnQupdate').click(function(){ 
        QuestionArray[QuestionNum-1].question = $('.questionname').val(); // update question name
        QuestionArray[QuestionNum-1].answers = []; //clear all options from answers
        if(QuestionArray[QuestionNum-1].answers.length == 0){
            $('.options').each(function(){
            QuestionArray[QuestionNum-1].answers.push($(this).val());
            }); //add all options to answers array list
        }
        $('.rboption').each(function(index){
            if ($(this).is(':checked')){
                QuestionArray[QuestionNum-1].correctanswer = QuestionArray[QuestionNum-1].answers[index];
            }
        });
    });          
    
    
    //Add options to Question
    $('#QuestionDisplay').on('click','input',function(){
        if ($(this).attr('id')=='btnAddO'){ // if user clicked on add option
                $('#QuestionDisplay').append('<br><input type = "radio" name = "options" class = "rboption"><input type = text class = "options">');
        }
    });
    
    
    
   
    
    //Submit Quiz to Serverside
    $('#btnTestSubmit').click(function(){
        console.log("QuestionArray");
        $.ajax({
            type: "POST",
            url: "saveTest.php",
            data: {form: QuestionArray,test_name: testname,test_time: testTime, test_desc : testDesc},
            dataType : "text",
            success: function(data){
                console.log(data);
            },
            error: function(e){
                console.log(e);
            }
        });
        alert(testname +" has been created");
        window.location.replace('home.php');
    });
});