// sessionStorage.setItem('status','loggedOut')

//if user has logged in, then set the session variable as true
/*$(document).ready(function(){
    $('body').on('click', '.inbutton', function() {
        sessionStorage.setItem('status','loggedIn')
        alert(sessionStorage.getItem('status'));
    });
});

//if user has signed in, then set the session variable as true
/*$(document).ready(function(){
    $('body').on('click', '.inbutton', function() {
        sessionStorage.setItem('status','loggedIn') 
        alert(sessionStorage.getItem('status'));
    });
});*/

//if logout, the session variable will be 'loggedOut'
/*$(document).ready(function(){
    $('body').on('click', '.outbutton', function() {
        sessionStorage.setItem('status','loggedOut')
        alert(sessionStorage.getItem('status'));
    });
});*/
/////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////
//there are unviewed notifications
function thereAreNotifications(notificationsNumber){
    //alert(notificationsNumber);
    document.getElementById("notificationsNumber").style.display="block";
    document.getElementById("notificationsNumber").innerHTML=notificationsNumber;
}
///////////////////////////////////////////////////////////////////////////////////////
//update profile picture preview
$(document).ready(function(){
    function readURL1(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //alert(document.getElementById("prof-pic").src);
                $('#prof-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profilePicture").change(function(){
        readURL1(this);
    });
});

//update group profile picture preview
$(document).ready(function(){
    function readURL1(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //alert(document.getElementById("prof-pic").src);
                $('#full-display').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#groupPic").change(function(){
        readURL1(this);
    });
});

////////////////////////////////////////////////////////////////////////////////////////////////
//quickview part

//open quick view part
$(document).ready(function(){
    $('body').on('click', '.quickview-img', function(e){ 
                
        var imageId = parseInt($(this).attr('id'));//converts the number which is stored in the form of string to an integer
        //alert(imageId);
        $(".cover-quick-view").toggle();
        //$("#quick-viewer-img"+imageId).toggle();
        $("#qv_image"+imageId).toggle();
        $('.quick-viewer').toggle();
        $(window).click(function(event){
            if($(event.target).hasClass('cover-quick-view')){
                $('.cover-quick-view').hide();
                $('.quick-viewer').hide();
                //$("#qv_image"+imageId).hide();
                $(".qv_image").hide();
            }
        });
        

    });
});

//next image
$(document).ready(function(){
    $('body').on('click', '.next-img', function(e){ 
        
        var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var imageId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        $("#qv_image"+(imageId)).toggle();
        $("#qv_image"+(imageId+1)).toggle();

    });
});

//previous image
$(document).ready(function(){
    $('body').on('click', '.prev-img', function(e){ 
        
        var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var imageId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        $("#qv_image"+(imageId)).toggle();
        $("#qv_image"+(imageId-1)).toggle();

    });
});


////////////////////////////////////////////////////////////////////////////////////////////////
//unchecking hinglish checkbox if english checkbox is clicked and vice versa
$(document).ready(function(){
    $('body').on('click', '.englishLanguageCheckbox', function(e){ 
        if($("#hinglishLanguageCheckbox").is(":checked")==true){
            $("#hinglishLanguageCheckbox").prop('checked', false);
        }
    });
});

$(document).ready(function(){
    $('body').on('click', '.hinglishLanguageCheckbox', function(e){ 
        if($("#englishLanguageCheckbox").is(":checked")){
            $("#englishLanguageCheckbox").prop('checked', false);
        }
    });
});
//choosing meme viewing language
$(document).ready(function(){
    //alert(sessionId);
    $(".chooseMemeViewingLanguage").submit(function(e){ 
        e.preventDefault();
        //alert("undau");
        var formData = new FormData(this);  
        //alert(formtype);  
        $.ajax
        ({
            type: 'POST',
            url: 'chooseMemeViewingLanguageSystem.php',
            data:formData,
            //dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {
                //alert("ikde ala re!");
                //alert(response);
                       
                if(response.trim()=="no selection"){
                    document.getElementById('memeLanguageError').innerHTML="No selection.";
                }
                else{
                    document.getElementById('memeLanguageError').innerHTML="Choices Saved.";   
                }
                
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
        
        return false;
    })
});


//////////////////////////////////////////////////////////////////////////////////////////////////
//upload image preview 
function readURL(input){
    //$('.upload-image-div').height($('#previewImage').height());
    alert("preview height:"+$('#previewImage').height());
    alert("upload height:"+$('.upload-image-div').height());
    $('.memecategory_select').css({
        'position':'absolute',
        'left':'412px',
        'top':'85px',
    });
    $('.proceed').css({
        'position':'absolute',
        'left':'613px',
        'top':'170px',
    });
    if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#previewImage').attr('src',e.target.result);
            console.log($('#previewImage').height());
            
            $('.upload-image-div').height($('.preview-image').height());
            $('.upload-btn').css({
                'margin-top':'10px',
                'margin-left':'597px',
                'font-size':'17px',
                'width':'150px',
                'padding-bottom':'10px',
                'padding-left':'5px',
            });
            $('.upload-btn').click(function(){
                $('.upload-image-div').height($('.preview-image').height());
            });
            $('.upload-btn').focusout();
            $('.preview-image').show();
            console.log($(":file").filestyle());
            $(":file").filestyle('buttonText','Change Image');
        };
        reader.readAsDataURL(input.files[0]);        
          
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////
//Notifications viewing status
$(document).ready(function(){
    //alert(sessionId);
    $('body').on('click', '.notif-link', function(e){ 
        e.preventDefault();        

        var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var notificationId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        //alert(notificationId);
        link=$(this).attr('href');
        //alert("link="+link);
        $.ajax   
        ({
            type: 'POST',
            url: 'notificationViewingStatusSystem.php',  
            data:{
                notificationId:notificationId
               },                     
            success: function (response) 
            {
                //alert(response);
                if(response.trim()=="success")
                {
                    window.location.href=link;
                }                
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
            
        return false;       
    })
});
/////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//INSTITUTE AUTOCOMPLETE SYSTEM
$(document).ready(function(){
    //alert(sessionId);
    $("#institute_signup_form").keyup(function(e){ 
        e.preventDefault();
        var inst=document.getElementById("institute_signup_form").value;
        //alert(inst);
        if(inst!=""){
            $.ajax
            ({
                type: 'POST',
                url: 'institute_autocomplete_system.php',
                data:{inst:inst},                             
                success: function (response) 
                {
                    document.getElementById("institute_autocomplete_suggestions").innerHTML=response;
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
            
            return false;
        }else{
            document.getElementById("institute_autocomplete_suggestions").innerHTML='';
        }
    })
});

//on clicking on any of the suggestions, the suggestion will pop up into the input field
$(document).ready(function(){

    $('body').on('click', '.institute_suggestions', function(e){ 
        
        var val=this.innerHTML;
        document.getElementById("institute_signup_form").value=val;
        $("#institute_autocomplete_suggestions").toggle();

        return false;

    })

});

//LOAD MORE
$(document).ready(function(){
    //alert("ege");
    //alert(window.location.pathname);
    //index page
    if(window.location.pathname=='/meagl.com/index.php'){
        if($.trim($("#recommended_content_div").html())==''){//alert("rtn");
            if(document.getElementById("index_page_recommended_loadmore_form")){
                document.getElementById("index_page_recommended_loadmore_form").style.display="none";
            }
            document.getElementById("recommended_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#shuffled_content_div").html())==''){//alert("rtn");
            if(document.getElementById("index_page_shuffled_loadmore_form")){
                document.getElementById("index_page_shuffled_loadmore_form").style.display="none";
            }
            document.getElementById("indexPageShuffle").style.display="none";
            document.getElementById("shuffled_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }

        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("index_page_trending_loadmore_form")){
                document.getElementById("index_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("index_page_fresh_loadmore_form")){
                document.getElementById("index_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }
    
    //savage page
    if(window.location.pathname=='/meagl.com/savagememes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("savage_page_trending_loadmore_form")){
                document.getElementById("savage_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("savage_page_fresh_loadmore_form")){
                document.getElementById("savage_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //sports page
    if(window.location.pathname=='/meagl.com/sportsmemes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("sports_page_trending_loadmore_form")){
                document.getElementById("sports_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("sports_page_fresh_loadmore_form")){
                document.getElementById("sports_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //celeb page
    if(window.location.pathname=='/meagl.com/celebmemes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("celeb_page_trending_loadmore_form")){
                document.getElementById("celeb_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("celeb_page_fresh_loadmore_form")){
                document.getElementById("celeb_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //gaming page
    if(window.location.pathname=='/meagl.com/gamingmemes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("gaming_page_fresh_loadmore_form")){
                document.getElementById("gaming_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("gaming_page_fresh_loadmore_form")){
                document.getElementById("gaming_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //comic page
    if(window.location.pathname=='/meagl.com/comicmemes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("comics_page_trending_loadmore_form")){
                document.getElementById("comics_page_trending_loadmore_form").style.display="none";
            }   
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("comics_page_fresh_loadmore_form")){
                document.getElementById("comics_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //justmythoughts page
    if(window.location.pathname=='/meagl.com/justmythoughts.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("justmythoughts_page_trending_loadmore_form")){
                document.getElementById("justmythoughts_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("justmythoughts_page_fresh_loadmore_form")){
                document.getElementById("justmythoughts_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //other page
    if(window.location.pathname=='/meagl.com/othermemes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("other_page_trending_loadmore_form")){
                document.getElementById("other_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("other_page_fresh_loadmore_form")){
                document.getElementById("other_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //college page
    if(window.location.pathname=='/meagl.com/college_school_memes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("college_page_trending_loadmore_form")){
                document.getElementById("college_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("college_page_fresh_loadmore_form")){
                document.getElementById("college_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }

    //politics page
    if(window.location.pathname=='/meagl.com/politics_memes.php'){
        if($.trim($("#trending_content_div").html())==''){//alert("rtn");
            if(document.getElementById("politics_page_trending_loadmore_form")){
                document.getElementById("politics_page_trending_loadmore_form").style.display="none";
            }
            document.getElementById("trending_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
        if($.trim($("#fresh_content_div").html())==''){//alert("rtn");
            if(document.getElementById("politics_page_fresh_loadmore_form")){
                document.getElementById("politics_page_fresh_loadmore_form").style.display="none";
            }
            document.getElementById("fresh_content_div").innerHTML="<p>No memes to be displayed.</p>";
        }
    }


});
$(document).ready(function(){
    //alert(sessionId);
    $(".load_more_memes_form").submit(function(e){ 
        e.preventDefault();
        //alert("undau");
        var formData = new FormData(this);            
        var formtype=$(this).attr('id'); 
        //alert(formtype);  
        $.ajax
        ({
            type: 'POST',
            url: 'functions.php',
            data:formData,
            //dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {
                //alert("ikde ala re!");
                //alert(response);
                if(response.trim()!=""){      
                    
                    //this is to hide the load more form(rather button)
                    var i=response.length;
                    for(i=i-1;i>=0;i--)
                    {                       
                        if(response.charAt(i)==' ')
                        {
                            var str=response.substring(i);
                            //alert(str);
                            if(str==" hide_form")
                            {
                                document.getElementById(formtype).style.display="none";
                                var final_response=response.substring(0,i+1);
                            }
                            else
                            {
                                var final_response=response;
                            }
                            break;
                        }
                    }
                    
                    //attaching the response data to the DOM
                    if(formtype=="index_page_recommended_loadmore_form"){
                        document.getElementById("recommended_content_div").innerHTML+=final_response;
                    }else if(formtype=="index_page_shuffled_loadmore_form"){
                        document.getElementById("shuffled_content_div").innerHTML+=final_response;
                    }
                    else if(formtype=="index_page_trending_loadmore_form" || formtype=="savage_page_trending_loadmore_form" || formtype=="sports_page_trending_loadmore_form" || formtype=="celeb_page_trending_loadmore_form" || formtype=="gaming_page_trending_loadmore_form" || formtype=="comics_page_trending_loadmore_form" || formtype=="justmythoughts_page_fresh_loadmore_form" || formtype=="other_page_fresh_loadmore_form" || formtype=="college_page_fresh_loadmore_form" || formtype=="politics_page_fresh_loadmore_form"){
                        document.getElementById("trending_content_div").innerHTML+=final_response;
                    }
                    else if(formtype=="index_page_fresh_loadmore_form" || formtype=="savage_page_fresh_loadmore_form" || formtype=="sports_page_fresh_loadmore_form" || formtype=="celeb_page_fresh_loadmore_form" || formtype=="gaming_page_fresh_loadmore_form" || formtype=="comics_page_fresh_loadmore_form" || formtype=="justmythoughts_page_fresh_loadmore_form" || formtype=="other_page_fresh_loadmore_form" || formtype=="college_page_fresh_loadmore_form" || formtype=="politics_page_fresh_loadmore_form"){
                        document.getElementById("fresh_content_div").innerHTML+=final_response;
                    }
                    else if(formtype=="my_memes_loadmore_form"){
                        document.getElementById("my_memes_content_div").innerHTML+=final_response;
                    }
                    else if(formtype=="subscribedcategories_loadmore_form"){
                        document.getElementById("subscribedcategories").innerHTML+=final_response;
                    }
                    else if(formtype=="all_subscribed_content_loadmore_form"){
                        document.getElementById("allcontent").innerHTML+=final_response;
                    }
                    else if(formtype=="questions_loadmore_form"){
                        document.getElementById("questions_content_div").innerHTML+=final_response;
                    }
                }
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
        
        return false;
    })
});


/////////////////////////////////////////////////////

$(document).ready(function(){
    $('img').bind('contextmenu', function(e){
        return false;
    });
});
 

//likes images Ajax function
function imagelikeFunction(imageId,likesLabel,errorLabel,likeButtonId){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //alert(document.getElementsByName(likesLabel)[0].innerHTML.match(/^\d+/));
    var getnumber=(document.getElementsByName(likesLabel)[0].innerHTML).match(/^\d+/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
        var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }
    //alert("numberOfLikesActual="+numberOfLikesActual);

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from likesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("Ajaxresponse="+Ajaxresponse);
            
            //alert("number of likes="+numberOfLikesActual);
            //alert("Ajaxresponse="+Ajaxresponse);
            if(Ajaxresponse=="login error"){
                //this will be executed if the user has not logged in
                var elements =document.getElementsByName(errorLabel);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You need to sign-in to like!";                    
                }
            }
            else if(Ajaxresponse=="user meme"){
                //this will be executed if the user is trying to like his own meme
                var elements =document.getElementsByName(errorLabel);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You cannot like your own meme!";                    
                }
            }
            //else if(Ajaxresponse=="undo like"){
                else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the meme
                //alert("undo like section..should now become like");
                var elements=document.getElementsByName(likesLabel);
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML=Ajaxresponse+" likes";                   
                }
                /*var likeElements=document.getElementsByClassName("like-button"+imageId);
                for ( i = 0; i < likeElements.length; i += 1) {
                    //likeElements[i].innerHTML="Like";      
                    likeElements[i].src="icons/undo_like_icon.jpg"; 
                }*/
                //alert(document.getElementById("like"+imageId).src+" undo karing "+("like"+imageId));
                //document.getElementById("like"+imageId).src = "icons/undo_like_icon.jpg"; 
                
                $(".like-button"+imageId).attr("src","icons/undo_like_icon.jpg");
            }
            else{

                //this will be executed if the person has logged in
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                //document.getElementById(likesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //document.getElementById("like"+imageId).innerHTML="Undo Like";
                var elements=document.getElementsByName(likesLabel);
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML=Ajaxresponse+" likes";                   
                }
                /*var likeElements=document.getElementsByClassName("like-button"+imageId);
                for ( i = 0; i < likeElements.length; i += 1) {
                    //likeElements[i].innerHTML="Undo Like";           
                    likeElements[i].src="icons/like_icon.jpg";       
                }*/
                //alert(document.getElementById("like"+imageId).src+" like karing "+("like"+imageId));
                //document.getElementById("like"+imageId).src ="icons/like_icon.jpg";

                $(".like-button"+imageId).attr("src","icons/like_icon.jpg");
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+imageId;

    xmlhttp.open("POST","imagelikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//subscribe(to meme uploader) system
function subscribeFunction(imageId,uploaderId,subscribeLabel,uploader){

    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var getnumber=(document.getElementById(subscribeLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
       var numberOfSubscribersActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }     

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from likesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert(Ajaxresponse);
            if(Ajaxresponse=="login error"){
                //this will be executed if the user has not logged in
                var elements =document.getElementsByName("Error"+imageId);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You need to sign-in to subscribe!";                    
                }
            }
            else if(Ajaxresponse=="uploader sub"){
                //this will be executed if the user is trying to subscribe to himself
                var elements =document.getElementsByName("Error"+imageId);
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You cannot subscribe to yourself!";             
                }
            }
            else if(Ajaxresponse=="subs not matching error"){

                //alert(Ajaxresponse);
                var elements = document.getElementsByName(subscribeLabel);                
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    //elements[i].innerHTML = "Number of Subscribers:"+Ajaxresponse;
                    elements[i].innerHTML = numberOfSubscribersActual;
                    if(Ajaxresponse>=100)
                    {
                        elements[i].style.width=72;
                    }
                    else if(Ajaxresponse<100&&Ajaxresponse>10)
                    {
                        elements[i].style.width=52;
                    }
                    else if(Ajaxresponse<=10)
                    {
                        elements[i].style.width=32;
                    }
                    //this for loop is so as to obtain all labels showing the number of subscribers for this user and to update them
                }
            }
            else if(Ajaxresponse<numberOfSubscribersActual){
                //this will be executed if the user is trying to unsubscribe
                //alert("UN-SUBSCRIBE to user");
                var elements = document.getElementsByName(subscribeLabel);
                var subscribebuttonid="subscribe"+uploaderId;
                var subscribeElements = document.getElementsByName(subscribebuttonid);
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    //elements[i].innerHTML = "Number of Subscribers:"+Ajaxresponse;
                    elements[i].innerHTML = Ajaxresponse;
                    if(Ajaxresponse>=100)
                    {
                        elements[i].style.width=72;
                    }
                    else if(Ajaxresponse<100&&Ajaxresponse>10)
                    {
                        elements[i].style.width=52;
                    }
                    else if(Ajaxresponse<=10)
                    {
                        elements[i].style.width=32;
                    }
                    //this for loop is so as to obtain all labels showing the number of subscribers for this user and to update them
                }
                for(i = 0; i < subscribeElements.length; i += 1){
                    //subscribeElements[i].innerHTML = "Subscribe to "+uploader;
                    subscribeElements[i].innerHTML = "Subscribe";
                    subscribeElements[i].style.color="white";
                    subscribeElements[i].style.letterSpacing="2px";
                    //subscribeElements[i].selected=false;
                }                   
            }
            else{
                //this will be executed if the person is trying to subscribe
                //alert("SUBSCRIBE to user");
                var elements = document.getElementsByName(subscribeLabel);
                var subscribebuttonid="subscribe"+uploaderId;
                var subscribeElements = document.getElementsByName(subscribebuttonid);
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    //elements[i].innerHTML = "Number of Subscribers:"+Ajaxresponse;
                    elements[i].innerHTML = Ajaxresponse;
                    if(Ajaxresponse>=100)
                    {
                        elements[i].style.width=72;
                    }
                    else if(Ajaxresponse<100&&Ajaxresponse>10)
                    {
                        elements[i].style.width=52;
                    }
                    else if(Ajaxresponse<=10)
                    {
                        elements[i].style.width=32;
                    }
                    //this for loop is so as to obtain all labels showing the number of subscribers for this user and to update them
                }
                for(i = 0; i < subscribeElements.length; i += 1){
                    //alert("BEFORE:subscribe elements of i="+i+" innerhtml="+subscribeElements[i].innerHTML);
                    //subscribeElements[i].innerHTML = "UnSubscribe to "+uploader;
                    subscribeElements[i].innerHTML = "Unsubscribe";
                    subscribeElements[i].style.color="white";

                    /////////////////////////////////////////
                    /*$(subscribeElements[i]).css({
                        letter-spacing: '0px';
                    });*/
                    subscribeElements[i].style.letterSpacing="-0.7px";
                   

                    ////////////////////////////////

                }
                var sb=document.getElementById("userprofile-subscribe-button");
                sb.style.background="black";
            }

        }
    }
    
    parameters="numberofSubscribers="+numberOfSubscribersActual+"&uploaderId="+uploaderId;

    xmlhttp.open("POST","subscribesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

/////////////////The following lines of code have been written in order to remove a shitty bug that was creeping in the subscribe button in which if you clicked the button, its inner text became black....the following lines by pass that shit and prevent it from happening...please dont change these lines of code otherwise 9gag will steal your meme
$(document).ready(function(){
  $('.subscribe-button').mouseover(function() {
    $(this).css("color", "#b522a8");
  });
});
$(document).ready(function(){
  $('.subscribe-button').mouseout(function() {
    $(this).css("color", "white");
  });
});
//
$(document).ready(function(){
  $('#userprofile-subscribe-button').mouseover(function() {
    $(this).css("background", "#ffffff");
    $(this).css("color", "#b522a8");
  });
});
$(document).ready(function(){
  $('#userprofile-subscribe-button').mouseout(function() {
    $(this).css("background", "#000000");
    $(this).css("color", "white");
  });
});
//////////////////////////////////////////////////////////////////////////////////

//subscribe(to meme CATEGORY) system
function memeCategorySubscribeFunction(imageId, memecategory, memeCategorySubscribersLabel){

    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var getnumber=(document.getElementById(memeCategorySubscribersLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
       var memeCategorySubscribersActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }
    //alert("memeCategorySubscribersActual="+memeCategorySubscribersActual);

    //alert("imageId="+imageId);
    //alert("memecategory="+memecategory);
    //alert("memeCategorySubscribersLabel="+ memeCategorySubscribersLabel);
    //alert("memeCategorySubscribers="+memeCategorySubscribers);
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from likesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert(Ajaxresponse);
            if(Ajaxresponse=="login error"){
                //this will be executed if the user has not logged in
                //document.getElementById("Error"+imageId).innerHTML="You need to sign-in to subscribe!";
                //the "error" paragraph tag has been created to specially display the error message
                var elements =document.getElementsByName("Error"+imageId);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You need to sign-in to subscribe to "+memecategory+"!";                    
                }
            }
            else if(Ajaxresponse=="already subbed error"){
                //this will be executed if the user is trying to subscribing to someone he already has
               // document.getElementById("Error"+imageId).innerHTML="You have already subscribed to this Meme Category!";
                var elements =document.getElementsByName("Error"+imageId);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You have already subscribed to this Meme Category!";                    
                }
            }
            else if(Ajaxresponse=="subs not matching error"){
                var elements = document.getElementsByName(memeCategorySubscribersLabel);                
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    //elements[i].innerHTML = "Number of Subscribers:"+Ajaxresponse;
                    elements[i].innerHTML = "Subscribers: "+memeCategorySubscribersActual;
                    if(Ajaxresponse>=100)
                    {
                        elements[i].style.width=72;
                    }
                    else if(Ajaxresponse<100&&Ajaxresponse>10)
                    {
                        elements[i].style.width=52;
                    }
                    else if(Ajaxresponse<=10)
                    {
                        elements[i].style.width=32;
                    }
                    //this for loop is so as to obtain all labels showing the number of subscribers for this user and to update them
                }
            }
            else if(Ajaxresponse<memeCategorySubscribersActual){
                //this will be executed if the user is trying to unsubscribe
                //alert("UN-SUBSCRIBE to CATEGORY");
                var elements = document.getElementsByName(memeCategorySubscribersLabel);
                var subscribebuttonid="subscribecategory"+memecategory;
                var subscribeElements = document.getElementsByName(subscribebuttonid);
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML = "Subscribers: "+Ajaxresponse;
                    //this for loop is so as to obtain all labels showing the number of subscribers for this user and to update them
                }
                for(i = 0; i < subscribeElements.length; i += 1)  {
                //alert("BEFORE:subscribe elements of i="+i+" innerhtml="+subscribeElements[i].innerHTML);  
                    subscribeElements[i].innerHTML = "Subscribe";
                    //alert("after:subscribe elements of i="+i+" innerhtml="+subscribeElements[i].innerHTML);
                }                
            }
            else{
                //this will be executed if the person has logged in and is trying to subscribe
                //alert("SUBSCRIBE to CATEGORY");
                var elements = document.getElementsByName(memeCategorySubscribersLabel);
                var subscribebuttonid="subscribecategory"+memecategory;
                var subscribeElements = document.getElementsByName(subscribebuttonid);
                var i; 
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML = "Subscribers: "+Ajaxresponse;
                    //this for loop is so as to obtain all labels showing the number of subscribers for this category and to update them
                }
                for(i = 0; i < subscribeElements.length; i += 1) {  
                //alert("BEFORE:subscribe elements of i="+i+" innerhtml="+subscribeElements[i].innerHTML); 
                    subscribeElements[i].innerHTML = "Unsubscribe";
                    //alert("after:subscribe elements of i="+i+" innerhtml="+subscribeElements[i].innerHTML);
                }
            }
        }
    }
    
    parameters="memeCategorySubscribers="+memeCategorySubscribersActual+"&memecategory="+memecategory;

    xmlhttp.open("POST","memeCategorySubscribeSystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//setting the comment box text
//sessionStorage.commentboxdata = "";

//alert(sessionStorage.getItem("commentboxdata"));

//comment system function for Ajax
/*comment system works as follows:
if user has not logged in then post comment button is not shown..only the comment text 
area is shown ..if the user clicks on it then he is redirected to the sign up page..
if he has signed up then no such shit..directly his comment gets posted..same for reply system

*/

$(document).ready(function(){
    $('.postcomment').click( function(){ 
            var comment = document.getElementById("comment").value;
            var datetime = document.getElementById("datetime").value;
            var imageId=document.getElementById("imageId").value;

            var world=document.getElementById("world").value;
            var sharedWithUserId=document.getElementById("sharedWithUserId").value;
            var sharedWithGroupId=document.getElementById("sharedWithGroupId").value;

            var numberOfCommentsname="comments"+imageId;//gets the id of the <p> tag that displays the number of comments for this meme                    
            var getnumber=(document.getElementById(numberOfCommentsname).innerHTML).match(/^\d+/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                    var numberOfComments = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //alert("numberOfComments="+numberOfComments);

            if(comment && datetime)
            {
                //alert("document.getElementById(comment).value="+document.getElementById("comment").value);
                //sessionStorage.setItem("commentboxdata",comment);//this stores the value of the comment written in the comment box
                //alert("sessionstorage="+sessionStorage.getItem("commentboxdata"));
                $.ajax
                ({
                    type: 'POST',
                    url: 'commentsystem.php',
                    data: 
                    {
                        comment:comment,
                        datetime:datetime,
                        imageId:imageId,
                        numberOfComments:numberOfComments,
                        world:world,
                        sharedWithUserId:sharedWithUserId,
                        sharedWithGroupId:sharedWithGroupId
                    },
                    success: function (response) 
                    {
                        //alert("response="+response.trim());
                        if(response.trim()=="not logged in"){
                            //alert("not loggedIn bhai");
                            
                            //sessionStorage.setItem("commentboxdata",document.getElementById("comment").value);
                            //alert(sessionStorage.getItem("commentboxdata"));
                            //var commentformid="commentform"+imageId;
                            //window.location.href="signup.php?lastpage="+encodeURIComponent("imagedisplay.php?id="+imageId+"#"+commentformid);//redirect to signup page and the hash scrolls the page to the comment box div
                        }else{
                            //alert(response);
                                              
                            document.getElementById("allcomments").innerHTML=response+document.getElementById("allcomments").innerHTML;//attaching the new comment on top of the previous comments
                            document.getElementById("comment").value="";//reseting the comment textarea 
                            
                            document.getElementById(numberOfCommentsname).innerHTML=(numberOfComments+1)+" Comments";

                            var divname="#"+$(".comment_div").first().attr('id');//gets the id of the comment div that has just been added
                            $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000);//scrolls down to the comment
                        }
                    }
                });
            } 
            return false;
        //}
        /*else{
            alert("second else mein aya");
        }*/
    })
});

//scroll to a particular id
/*$(window).on("beforeunload", function() {
            $(window).scrollTop(0);
        });*/

$(document).ready(function(){

    $('body').on('click', '.commentform', function(e){ 
        //alert("clicked!");
        //if user has not signed in then only the comment box will be displayed and if the comment box is clicked then the user will be redirected to the sign in page
        if(sessionId==''){

            var imageId=document.getElementById("imageId").value;
            var commentformid="commentform"+imageId;
            window.location.href="signup.php?lastpage="+encodeURIComponent("imagedisplay.php?id="+imageId+"#"+commentformid);//redirect to signup page and the hash scrolls the page to the comment box div
        }

        return false;

    })

});


//reply system using Ajax
$(document).ready(function(){
    $('body').on('click', '.postreplybutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var commentId=$(this).attr("name");
        var replytextname="replytext"+commentId;
        var datetimename="datetime"+commentId;
        var reply = document.getElementById(replytextname).value;
        var imageId=document.getElementById("imageId").value;
        //alert(reply);
        //alert(commentId);
        var datetime = document.getElementById(datetimename).value;
        //alert(datetime);        
        //var numberOfReplies=parseInt(document.getElementById("numberOfReplies"+commentId).innerHTML.substr((document.getElementById("numberOfReplies"+commentId).innerHTML).length-1));//this gets the number of replies for this comment
        
        var getnumber=(document.getElementById("numberOfReplies"+commentId).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var numberOfReplies = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        //var numberOfRepliesName="numberOfReplies"+commentId;
       // alert(numberOfReplies);
        if(reply && datetime)
        {   //alert("hello b");
            $.ajax
            ({
                type: 'POST',
                url: 'replysystem.php',
                data: 
                {
                    reply:reply,
                    datetime:datetime,
                    commentId:commentId
                },
                success: function (response) 
                {
                    if(response.trim()=="not logged in"){

                        //window.location.href="signup.php?lastpage=imagedisplay.php?id="+imageId;//redirect to signup page
                    }else{
                        var allrepliesname="allreplies"+commentId;
                        //alert(allrepliesname);
                        document.getElementById(allrepliesname).innerHTML=document.getElementById(allrepliesname).innerHTML+response;//attaching the new reply on top of the previous replies
                        document.getElementById(replytextname).value="";//reseting the reply textarea 
                        
                        if($(".repliestogglebutton[name="+commentId+"]").css('display')=="none"){
                            $(".repliestogglebutton[name="+commentId+"]").toggle();//gets the repliestogglebutton with name equal to the commentId of the comment and toggles it that is, displays it so that it can be used to toggle all replies
                        }

                        var divname="#allreplies"+commentId;//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
                        //alert(divname);
                        if($(divname).css('display')=="none"){
                            //if the allrepliesdiv is already open then dont close it but if it is closed(tht is if its style is "none") then open it that is, toggle it
                            $(divname).toggle();//line 151 and 152 open the allrepliesdiv when a comment is posted
                            //$("html, body").animate({ scrollTop: $(divname).offset().top }, 1000);
                        }
                        var divname2="#"+$(divname).children().last().attr('id');//gets the id of the last reply in order to scroll to it
                        //alert(divname2);
                        $("html, body").animate({ scrollTop: $(divname2).offset().top }, 1000);//scrolls down to the comment

                        //increasing the number of replies for the comment
                        document.getElementById("numberOfReplies"+commentId).innerHTML="Number of Replies: "+(numberOfReplies+1);//herer we increase the number of replies by 1 and then update the innerHTML of the <p> which displays the number of replies to this particular comment
                    }   
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//this is to show all replies when the show replies button below a comment is clicked
$(document).ready(function(){
    $('body').on('click', '.repliestogglebutton', function(){ 
        var divname="#allreplies"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
        $(divname).toggle();  
        /*if($(divname).css('display')!="none"){//that is, if reply boox is opened-only then scroll, else, dont scroll
            $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it     
        }*/
    });
});

//this is to display the reply form when the showreplyformbutton below a comment is clicked
$(document).ready(function(){
    var divname;
    $('body').on('click', '.showreplyformbutton', function() {
        if(sessionId!=''){       
            divname="#replyform"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
            //alert(divname);
            $(divname).toggle();

            //changes 1.0 below
            setTimeout(function() {
                $('.text-reply').focus();
            }, 0);
            //changes 2.0 below
            $('.text-reply').focusin(function(){
                $('.post-reply').show();
                $('.post-reply').css({
                    'border-bottom': 'solid 2px #b522a8',
                });
                
            });
            $('.showreplyformbutton').click(function(){
                $(divname).hide();
            });
            
            //changes 2.0 end
            /*if($(divname).css('display')!="none"){//that is, if reply box is opened-only then scroll, else, dont scroll
                $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it
            }*/
                        
        }
        else{
            var commentId=$(this).attr("name");
            var imageId=document.getElementById("imageId").value;
            window.location.href="signup.php?lastpage="+encodeURIComponent("imagedisplay.php?id="+imageId+"#commentdiv"+commentId);//redirect to signup page and the hash scrolls the page to the comment box div
        }
        
    });
    //changes 2.0
    $('body').on('click',function(event){
        console.log(event.target);
        console.log(event.target.className);
        console.log($(event.target).hasClass('showreplyformbutton'));
        if($(event.target).hasClass('post-reply')||$(event.target).hasClass('reply-link')||$(event.target).hasClass('text-reply')){
            
        }
        else{
            console.log('ayesh');
            $(divname).hide();
            $('.post-reply').hide();
        }
    });
    $('.post-reply').click(function(){
        $(divname).hide();
        $('.text-reply').height(35);
    });
    //changes 2.0 end

});

//
$(document).ready(function(){

});

$(document).ready(function(){
    if(window.location.hash){
        //if there is hash present, 
        var hash=window.location.hash;
        var stringtobechecked = hash.replace(/[^A-Za-z]+/g, '');//gets the letters from the hash
        var id=hash.replace(/\D/g,'');
        if(stringtobechecked=="commentdiv"){
            //if the stringtobechecked equals "commentdiv" then the redirection is done due to the pressing of the "showreplyformbutton" so, we'll now toggle the showreplyform div
            var divname="#replyform"+id;//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
            //alert(divname);
            $(divname).toggle();
        }else{
            //alert(window.location.hash);
            $('body').animate({scrollTop: $(window.location.hash).offset().top}, 1500);//answer to a question ka scroll from memedevelopers forum to question display.php
        }
    }
});

//likes comments Ajax function
function commentlikeFunction(commentId,commentlikesLabel){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var getnumber=(document.getElementById(commentlikesLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
       var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }                

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from commentlikesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("hi gndu");
            if(Ajaxresponse=="login error"){
                //alert("login error");
                //this will be executed if the user has not logged in
                document.getElementById("commentLikeError"+commentId).innerHTML="You need to sign-in to like!";
                //the "error" paragraph tag has been created to specially display the error message
            }
            else if(Ajaxresponse=="user comment"){
                //alert("user comment");
                //this will be executed if the user is trying to like his own comment
                document.getElementById("commentLikeError"+commentId).innerHTML="You cannot like your own comment!";
            }
            else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the comment
                //alert("undo like section..should now become like");
                document.getElementById(commentlikesLabel).innerHTML="Likes:"+Ajaxresponse;
                //alert("like"+commentId+" like ho raha hai");
                var commentlikebuttonid="commentlike"+commentId;
                //alert(commentlikebuttonid);
                 //$(".likecommentbutton[name="+commentId+"]").html('Like');
                 //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(commentlikebuttonid).innerHTML="Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
            else{

                //this will be executed if the person has logged in and is trying to like the comment
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                document.getElementById(commentlikesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //alert("like"+commentId+" undo ho raha hai");
                var commentlikebuttonid="commentlike"+commentId;
                //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(commentlikebuttonid).innerHTML="Undo Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+commentId;

    xmlhttp.open("POST","commentlikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//reply likes Ajax function
function replylikeFunction(replyId,replylikesLabel){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var getnumber=(document.getElementById(replylikesLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
        var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }

       xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from replylikesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("hi gndu");
            if(Ajaxresponse=="login error"){
                //alert("login error");
                //this will be executed if the user has not logged in
                document.getElementById("replyLikeError"+replyId).innerHTML="You need to sign-in to like!";
                //the "error" paragraph tag has been created to specially display the error message
            }
            else if(Ajaxresponse=="user reply"){
                //alert("user reply");
                //this will be executed if the user is trying to like his own reply
                document.getElementById("replyLikeError"+replyId).innerHTML="You cannot like your own reply!";
            }
            else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the comment
                //alert("undo like section..should now become like");
                document.getElementById(replylikesLabel).innerHTML="Likes:"+Ajaxresponse;
                //alert("like"+commentId+" like ho raha hai");
                var replylikebuttonid="replylike"+replyId;
                //alert(commentlikebuttonid);
                 //$(".likecommentbutton[name="+commentId+"]").html('Like');
                 //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(replylikebuttonid).innerHTML="Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
            else{

                //this will be executed if the person has logged in and is trying to like the comment
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                document.getElementById(replylikesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //alert("like"+commentId+" undo ho raha hai");
                var replylikebuttonid="replylike"+replyId;
                //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(replylikebuttonid).innerHTML="Undo Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+replyId;

    xmlhttp.open("POST","replylikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//delete comments system using Ajax
var deletecomment=false;
$(document).ready(function(){
    $('body').on('click', '.deletecommentbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var commentId=$(this).attr("name");
        var imageId=document.getElementById("imageId").value;
        //alert("comment"+commentId+"&imgId="+imageId);
        var numberOfCommentsname="comments"+imageId;//gets the id of the <p> tag that displays the number of comments for this meme
        //alert(numberOfCommentsname);
        var getnumber=(document.getElementById(numberOfCommentsname).innerHTML).match(/^\d+/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var numberOfComments = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        //alert("numberOfComments="+numberOfComments);
        if(confirm("Do you really wish to delete this comment?"))
        {   
            deletecomment=true;
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deletecomments.php',
                data: 
                {
                    commentId:commentId,
                    numberOfComments:numberOfComments,
                    imageId:imageId
                },
                success: function (response) 
                {                    
                    //alert(response);      
                    if(response=="success"){    
                        //$(self).parent().remove();//removes the entire div that contains this comment.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                        $("#commentdiv"+commentId).remove();
                        document.getElementById(numberOfCommentsname).innerHTML=(numberOfComments-1)+ " Comments"; 
                    }  
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//delete reply system using Ajax
$(document).ready(function(){
    $('body').on('click', '.deletereplybutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var replyId=$(this).attr("name");
        var commentId=$(this).attr("id");
        //alert(commentId);
        //var numberOfReplies=parseInt(document.getElementById("numberOfReplies"+commentId).innerHTML.substr((document.getElementById("numberOfReplies"+commentId).innerHTML).length-1));//this gets the number of replies for the comment whose reply is being deleted
        //alert(numberOfReplies);
        var getnumber=(document.getElementById("numberOfReplies"+commentId).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var numberOfReplies = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        if(confirm("Do you really wish to delete this reply?"))
        {   
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deletereply.php',
                data: 
                {
                    replyId:replyId
                },
                success: function (response) 
                {                    
                    //alert("deleting"); 
                    //alert(response);
                    if(response=="success")     
                    {        

                        $(self).parent().parent().remove();//removes the entire div that contains this reply.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                        document.getElementById("numberOfReplies"+commentId).innerHTML="Number of Replies: "+(numberOfReplies-1);//reduces number of replies by one on webpage for this comment
                        
                        if((numberOfReplies-1)==0){
                            $(".repliestogglebutton[name="+commentId+"]").toggle();
                            //removes the replies toggle button once all the replies have been deleted
                        }
                    }  
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});


//this is to make the comment editable
$(document).ready(function(){
    $('body').on('click', '.editcommentbutton', function() {
        var commentId=$(this).attr("name");
        var commentname="#comment"+commentId;//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
        $(commentname).attr('contenteditable','true');//sets the comment to editable

        $(".editcommentbutton[name="+commentId+"]").toggle();//make the editcommentbutton(which only makes the comment editable) invisible

        if($(".updatecommentbutton[name="+commentId+"]").css('display')=="none"){
            $(".updatecommentbutton[name="+commentId+"]").toggle();//gets the repliestogglebutton with name equal to the commentId of the comment and toggles it that is, displays it so that it can be used to toggle all replies
        }
    });
});


//now to update the info in the database while editing comments(using ajax)
$(document).ready(function(){
    $('body').on('click', '.updatecommentbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var commentId=$(this).attr("name");
        //alert(commentId);
        var commentname="comment"+commentId;
        //alert(commentname);
        var comment=document.getElementById(commentname).innerHTML;//fetched the edited text..that is the comment after editing it
        //$(comment).find('br').remove();
        comment = comment.replace(/\<br\>/g,"");//removes any <br> tags that might crop up in the edited text
        //alert(comment);
        if(comment)
        {   //alert("hello b");
            $.ajax
            ({
                type: 'POST',
                url: 'updatecomment.php',
                data: 
                {
                    comment:comment,
                    commentId:commentId
                },
                success: function (response) 
                {
                    //alert("hello madafaka");
                    document.getElementById(commentname).innerHTML=comment;//replacing the old comment by the new one
                    
                    $(".editcommentbutton[name="+commentId+"]").toggle();//displays the editcommentbutton
                    $(".updatecommentbutton[name="+commentId+"]").toggle();//hides the update comment button
                    
                    commentnameid="#"+commentname;
                    $(commentnameid).attr('contenteditable','false');//sets the comment editable to false
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//this is to make the reply editable
$(document).ready(function(){
    $('body').on('click', '.editreplybutton', function() {
        var replyId=$(this).attr("name");
        var replyname="#reply"+replyId;
        $(replyname).attr('contenteditable','true');//sets the reply to editable

        $(".editreplybutton[name="+replyId+"]").toggle();//make the editreplybutton(which only makes the reply editable) invisible

        if($(".updatereplybutton[name="+replyId+"]").css('display')=="none"){
            $(".updatereplybutton[name="+replyId+"]").toggle();
        }
    });
});


//now to update the info in the database while editing replies(using ajax)
$(document).ready(function(){
    $('body').on('click', '.updatereplybutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var replyId=$(this).attr("name");
        //alert(commentId);
        var replyname="reply"+replyId;
        //alert(commentname);
        var reply=document.getElementById(replyname).innerHTML;//fetched the edited text..that is the comment after editing it
        //$(comment).find('br').remove();
        reply = reply.replace(/\<br\>/g,"");//removes any <br> tags that might crop up in the edited text
        //alert(comment);
        if(reply)
        {   //alert("hello b");
            $.ajax
            ({
                type: 'POST',
                url: 'updatereply.php',
                data: 
                {
                    reply:reply,
                    replyId:replyId
                },
                success: function (response) 
                {
                    //alert("hello madafaka");
                    document.getElementById(replyname).innerHTML=reply;//replacing the old comment by the new one
                    
                    $(".editreplybutton[name="+replyId+"]").toggle();//displays the editcommentbutton
                    $(".updatereplybutton[name="+replyId+"]").toggle();//hides the update comment button
                    
                    replynameid="#"+replyname;
                    $(replynameid).attr('contenteditable','false');//sets the comment editable to false
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//upload meme process
$(document).ready(function(){
    //alert(sessionId);
    $("#uploadmemeform"+sessionId).submit(function(e){ 
        e.preventDefault();
        var formData = new FormData(this);
            $.ajax
            ({
                type: 'POST',
                url: 'uploadmemeh.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);
                    if(response.trim()==="no meme title"){//i had to trim it otherwise it was not working for some reason
                        document.getElementById("uploadmemeerror").innerHTML="You have not put any meme title!";
                    }
                    else if(response.trim()==="no file selected"){
                        document.getElementById("uploadmemeerror").innerHTML="No file selected!";
                    }
                    else if(response.trim()==="not logged in"){
                        //document.getElementById("uploadmemeerror").innerHTML="You need to sign in to upload!";
                        window.location.href="signup.php?lastpage="+currentPage;
                    }
                    else if(response.trim()==="file too large"){
                        document.getElementById("uploadmemeerror").innerHTML="The file you selected is too large! Max file size is 6MB";
                    } 
                    else if(response.trim()==="wrong file type"){
                        document.getElementById("uploadmemeerror").innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                    }
                    else if(response.trim()==="category not selected"){
                        document.getElementById("uploadmemeerror").innerHTML="Please select meme category";
                    }  
                    else if(response.trim()==="meme sharing options not chosen"){
                        document.getElementById("uploadmemeerror").innerHTML="Please select meme sharing options";
                    } 
                    else if(response.trim()==="language not chosen"){
                        document.getElementById("uploadmemeerror").innerHTML="Please select meme language";
                    }           
                    else{
                        //meme uploaded succesfully with response being the id of the meme(that has now been inserted)
                        //alert("Meme successfully uploaded");
                        //alert(response);
                        window.location.href="imagedisplay.php?id="+parseInt(response);//redirect to imagedisplay page
                    }
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
        return false;
    })
});

//update profile picture
$(document).ready(function(){
    //alert(sessionId);
    $("#updateProfilePicture").submit(function(e){ 
        e.preventDefault();
        var formData = new FormData(this);
            $.ajax
            ({
                type: 'POST',
                url: 'updateProfilePicture.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);
                    if(response.trim()==="no file selected"){
                        document.getElementById("uploadmemeerror").innerHTML="No file selected!";
                    }
                    else if(response.trim()==="file too large"){
                        document.getElementById("uploadmemeerror").innerHTML="The file you selected is too large! Max file size is 6MB";
                    } 
                    else if(response.trim()==="wrong file type"){
                        document.getElementById("uploadmemeerror").innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                    }
                    else{
                        window.location.href="userprofile.php?id="+parseInt(response);//redirect to imagedisplay page
                    }
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
        return false;
    })
});




//delete memes system using Ajax
$(document).ready(function(){
    $('body').on('click', '.deleteimagebutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var imageId=$(this).attr("name");
        

        if(confirm("Do you really wish to delete this meme?"))
        {               
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deleteimage.php',
                data: 
                {                    
                    imageId:imageId
                },
                success: function (response) 
                {                    
                    //alert("deleting");              
                    //$(self).parent().remove();//removes the entire div that contains this comment.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                    if(response.trim()!=="failure")
                    {   
                        //alert("Meme deleted!");
                        //alert("response="+response);
                        window.location.href="userprofile.php?id="+response;
                    }
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//MEME DEVELOPERS' FORUM
$(document).ready(function(){
    //if the ask question link is clicked, then check if the user has logged in or not
    $('#askquestion').on('click', function() {
        if(sessionId==''){
            //if user has not logged in
            window.location.href="signup.php?lastpage="+encodeURIComponent("askquestion.php");
        }
    });
});

//likes questions Ajax function
function questionlikeFunction(questionId,likesLabel){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var getnumber=(document.getElementsByName(likesLabel)[0].innerHTML).match(/^\d+/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //alert("numberOfLikesActual="+numberOfLikesActual);

       xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from likesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("Ajaxresponse="+Ajaxresponse);
            
            //alert("number of likes="+numberOfLikesActual);
            //alert("Ajaxresponse="+Ajaxresponse);
            if(Ajaxresponse=="login error"){
                //this will be executed if the user has not logged in
                var elements =document.getElementsByName("Error"+questionId);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You need to sign-in to like!";                    
                }
            }
            else if(Ajaxresponse=="user question"){
                //this will be executed if the user is trying to like his own meme
                var elements =document.getElementsByName("Error"+questionId);
                //the "error" paragraph tag has been created to specially display the error message
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML="You cannot like your own question!";                    
                }
            }
            //else if(Ajaxresponse=="undo like"){
                else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the meme
                //alert("undo like section..should now become like");
                var elements=document.getElementsByName(likesLabel);
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML=Ajaxresponse+" likes";                   
                }
                var likeElements=document.getElementsByName("questionlike"+questionId);
                for ( i = 0; i < likeElements.length; i += 1) {
                    likeElements[i].innerHTML="Like";                 
                }
            }
            else{

                //this will be executed if the person has logged in
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                //document.getElementById(likesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //document.getElementById("like"+imageId).innerHTML="Undo Like";
                var elements=document.getElementsByName(likesLabel);
                for ( i = 0; i < elements.length; i += 1) {
                    elements[i].innerHTML=Ajaxresponse+" likes";                   
                }
                var likeElements=document.getElementsByName("questionlike"+questionId);
                for ( i = 0; i < likeElements.length; i += 1) {
                    likeElements[i].innerHTML="Undo Like";                 
                }
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+questionId;

    xmlhttp.open("POST","questionlikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//ask question process 
$(document).ready(function(){
    //alert(sessionId);
    $("#askquestionform"+sessionId).submit(function(e){ 
        e.preventDefault();
        var formData = new FormData(this);
            $.ajax
            ({
                type: 'POST',
                url: 'askquestionh.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);
                    if(response.trim()==="no question title"){//i had to trim it otherwise it was not working for some reason
                        document.getElementById("askQuestionError").innerHTML="You have not put any meme title!";
                    }
                    else if(response.trim()==="no file selected"){
                        document.getElementById("askQuestionError").innerHTML="No file selected!";
                    }
                    else if(response.trim()==="file too large"){
                        document.getElementById("askQuestionError").innerHTML="The file you selected is too large! Max file size is 6MB";
                    } 
                    else if(response.trim()==="wrong file type"){
                        document.getElementById("askQuestionError").innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                    }   
                    else if(response.trim()==="no question statement"){
                        document.getElementById("askQuestionError").innerHTML="Please enter question statement";
                    }               
                    else{
                        //question asked succesfully with response being the id of the question(that has now been inserted)
                        window.location.href="questiondisplay.php?id="+parseInt(response);//redirect to signup page
                        //window.location.href="memedevelopersforum.php";
                    }
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
        return false;
    })
});

//if not signed in, then redirect to signup page on clicking the answer box
$(document).ready(function(){

    $('body').on('click', '#answer', function(e){ 
        //alert("clicked!");
        //if user has not signed in then only the answer box will be displayed and if the answer box is clicked then the user will be redirected to the sign in page
        if(sessionId==''){
            //alert("clicked");
            var questionId=document.getElementById("questionId").value;
            var answerformid="answerform"+questionId;
            window.location.href="signup.php?lastpage="+encodeURIComponent("questiondisplay.php?id="+questionId+"#"+answerformid);//redirect to signup page and the hash scrolls the page to the answer box div
        }

        return false;

    })

});

//answering system
$(document).ready(function(){
    $('body').on('click', '.postanswerbutton', function(e){ 
        e.preventDefault();
        //alert("aat ala ata");
        var questionId=document.getElementById("questionId").value;
        var formname="#answerform"+questionId;
        var form = $(formname)[0]; //getting form data
        var formData = new FormData(form);
                
        var numberOfAnswersname="answers"+questionId;//gets the id of the <p> tag that displays the number of comments for this meme                    
        var getnumber=(document.getElementById(numberOfAnswersname).innerHTML).match(/^\d+/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
                var numberOfAnswersActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        formData.append("numberOfAnswersActual",numberOfAnswersActual);//attaching numberOfAnswersActual variable to the form data
        
            $.ajax
            ({
                type: 'POST',
                url: 'answersystem.php',
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) 
                {
                    //alert("response="+response.trim());
                    if(response.trim()=="wrong file type"){
                        document.getElementById("answerformuploaderror").innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                        
                    }
                    else if(response.trim()=="file too large"){
                        document.getElementById("answerformuploaderror").innerHTML="The file you selected is too large! Max file size is 6MB";
                    }
                    else{
                        //alert("post answer response="+response);                
                        document.getElementById("allanswers").innerHTML=response+document.getElementById("allanswers").innerHTML;//attaching the new comment on top of the previous comments
                        document.getElementById("answer").value="";//reseting the comment textarea 
                        
                        document.getElementById(numberOfAnswersname).innerHTML="Number Of Answers:"+(numberOfAnswersActual+1);
                        var divname="#"+$(".answer_div").first().attr('id');//gets the id of the comment div that has just been added
                        $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000);//scrolls down to the comment
                    }
                }
            });
        //} 
        return false;
    })
});

//answer likes Ajax function
function answerlikeFunction(answerId,answerlikesLabel){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var getnumber=(document.getElementById(answerlikesLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
       var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }                

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from commentlikesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("hi gndu");
            if(Ajaxresponse=="login error"){
                //alert("login error");
                //this will be executed if the user has not logged in
                document.getElementById("answerLikeError"+answerId).innerHTML="You need to sign-in to like!";
                //the "error" paragraph tag has been created to specially display the error message
            }
            else if(Ajaxresponse=="user answer"){
                //alert("user comment");
                //this will be executed if the user is trying to like his own comment
                document.getElementById("answerLikeError"+answerId).innerHTML="You cannot like your own answer!";
            }
            else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the comment
                //alert("undo like section..should now become like");
                document.getElementById(answerlikesLabel).innerHTML="Likes:"+Ajaxresponse;
                //alert("like"+commentId+" like ho raha hai");
                var answerlikebuttonid="answerlike"+answerId;
                //alert(commentlikebuttonid);
                 //$(".likecommentbutton[name="+commentId+"]").html('Like');
                 //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(answerlikebuttonid).innerHTML="Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
            else{

                //this will be executed if the person has logged in and is trying to like the comment
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                document.getElementById(answerlikesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //alert("like"+commentId+" undo ho raha hai");
                var answerlikebuttonid="answerlike"+answerId;
                //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(answerlikebuttonid).innerHTML="Undo Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+answerId;

    xmlhttp.open("POST","answerlikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//this is to display the reply form when the showanswerreplyformbutton below an answer is clicked
$(document).ready(function(){
    $('body').on('click', '.showanswerreplyformbutton', function() {
        if(sessionId!=''){       
            var divname="#answerreplyform"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
            //alert(divname);
            $(divname).toggle();
            if($(divname).css('display')!="none"){//that is, if reply box is opened-only then scroll, else, dont scroll
                $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it
            }
            var divname="#includeExternalImageButton"+$(this).attr("name");
            $(divname).toggle();
            var divname="#includeLinkButton"+$(this).attr("name");
            $(divname).toggle();
            
                        
        }
        else{
            var answerId=$(this).attr("name");
            var questionId=document.getElementById("questionId").value;
            window.location.href="signup.php?lastpage="+encodeURIComponent("questiondisplay.php?id="+questionId+"#answerdiv"+answerId);//redirect to signup page and the hash scrolls the page to the comment box div
        }
        
    });
});


//this is to show all replies to an answer when the showanswerrepliesbutton below an answer is clicked
$(document).ready(function(){
    $('body').on('click', '.answerrepliestogglebutton', function(){ 
        var divname="#allanswerreplies"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
        $(divname).toggle();  
        if($(divname).css('display')!="none"){//that is, if reply boox is opened-only then scroll, else, dont scroll
            $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it     
        }
    });
});

//reply to an answer system using Ajax
$(document).ready(function(){
    $('body').on('click', '.postanswerreplybutton', function(e){ 
        e.preventDefault();
        //alert("aat ala ata");
        var answerId=$(this).attr("name");
        var formname="#answerreplyform"+answerId;
        var form = $(formname)[0]; //getting form data
        var formData = new FormData(form);
                
        var numberOfRepliesname="numberOfReplies"+answerId;//gets the id of the <p> tag that displays the number of comments for this meme                    
        var getnumber=(document.getElementById(numberOfRepliesname).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
                var numberOfRepliesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        formData.append("numberOfRepliesActual",numberOfRepliesActual);//attaching numberOfAnswersActual variable to the form data
        
            $.ajax
            ({
                type: 'POST',
                url: 'answerreplysystem.php',
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) 
                {
                    //alert("response="+response.trim());
                    if(response.trim()=="wrong file type"){
                        document.getElementById("answerreplyerror"+answerId).innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                        
                    }
                    else if(response.trim()=="file too large"){
                        document.getElementById("answerreplyerror"+answerId).innerHTML="The file you selected is too large! Max file size is 6MB";
                    }
                    else{
                        //alert("answer reply response="+response);                        
                        document.getElementById("allanswerreplies"+answerId).innerHTML=document.getElementById("allanswerreplies"+answerId).innerHTML+response;//attaching the new comment on top of the previous comments
                        document.getElementById("replytext"+answerId).value="";//reseting the comment textarea 
                        //alert("answer reply response="+response);
                        document.getElementById(numberOfRepliesname).innerHTML="Number Of Replies:"+(numberOfRepliesActual+1);
                        var divname="#"+"allanswerreplies"+answerId;//gets the id of the answerreply div that has just been added
                        
                        if($(".answerrepliestogglebutton[name="+answerId+"]").css('display')=="none"){
                            $(".answerrepliestogglebutton[name="+answerId+"]").toggle();//gets the repliestogglebutton with name equal to the commentId of the comment and toggles it that is, displays it so that it can be used to toggle all replies
                        }

                        //alert("divname="+divname);
                        if($(divname).css('display')=="none"){
                            //if the allrepliesdiv is already open then dont close it but if it is closed(tht is if its style is "none") then open it that is, toggle it
                            $(divname).toggle();                            
                        }
                        var divname2="#"+$(divname).children().last().attr('id');//gets the id of the last reply in order to scroll to it
                        //alert(divname2);
                        $("html, body").animate({ scrollTop: $(divname2).offset().top }, 1000);//scrolls down to the comment
                    }
                }
            });
        //} 
        return false;
    })
});

//delete answer memes system using Ajax
$(document).ready(function(){
    $('body').on('click', '.deletequestionbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var questionId=$(this).attr("name");
        

        if(confirm("Do you really wish to delete this question?"))
        {               
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deletequestion.php',
                data: 
                {                    
                    questionId:questionId
                },
                success: function (response) 
                {    
                    if(response.trim()!=="failure") {
                        //alert("deleting");              
                        //$(self).parent().remove();//removes the entire div that contains this comment.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                        //alert("Question deleted!");
                        //alert("response="+response);
                        window.location.href="userprofile.php?id="+response;
                    }               
                    
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//answer reply likes Ajax function
function answerreplylikeFunction(replyId,replylikesLabel){
    if (window.XMLHttpRequest) {                
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //alert("here!");
    var getnumber=(document.getElementById(replylikesLabel).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
    if(getnumber){
        var numberOfLikesActual = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
    }

       xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            Ajaxresponse=xmlhttp.responseText;//the response from replylikesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
            //alert("hi gndu");
            //alert("response="+Ajaxresponse);
            if(Ajaxresponse=="login error"){
                //alert("login error");
                //this will be executed if the user has not logged in
                document.getElementById("answerreplyLikeError"+replyId).innerHTML="You need to sign-in to like!";
                //the "error" paragraph tag has been created to specially display the error message
            }
            else if(Ajaxresponse=="user reply"){
                //alert("user reply");
                //this will be executed if the user is trying to like his own reply
                document.getElementById("answerreplyLikeError"+replyId).innerHTML="You cannot like your own reply!";
            }
            else if(Ajaxresponse<numberOfLikesActual){
                //this will be executed if the user is trying to undo his like for the comment
                //alert("undo like section..should now become like");
                document.getElementById(replylikesLabel).innerHTML="Likes:"+Ajaxresponse;
                //alert("like"+commentId+" like ho raha hai");
                var replylikebuttonid="answerreplylike"+replyId;
                //alert(commentlikebuttonid);
                 //$(".likecommentbutton[name="+commentId+"]").html('Like');
                 //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(replylikebuttonid).innerHTML="Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
            else{

                //this will be executed if the person has logged in and is trying to like the comment
                //alert(Ajaxresponse);
                //alert("like section..should now become undo like");
                document.getElementById(replylikesLabel).innerHTML = "Likes:"+Ajaxresponse;//here, likesLabel is appended from the info received from likesystem.php
                //alert("like"+commentId+" undo ho raha hai");
                var replylikebuttonid="answerreplylike"+replyId;
                //alert("before="+document.getElementById(commentlikebuttonid).innerHTML);
                document.getElementById(replylikebuttonid).innerHTML="Undo Like";
                //alert("after="+document.getElementById(commentlikebuttonid).innerHTML);
            }
        }
    }
    
    parameters="numberOfLikes="+numberOfLikesActual+"&id="+replyId;

    xmlhttp.open("POST","answerreplylikesystem.php",true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
    xmlhttp.send(parameters);
    
}

//delete answers system using Ajax
$(document).ready(function(){
    $('body').on('click', '.deleteanswerbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var answerId=$(this).attr("name");
        var questionId=document.getElementById("questionId").value;
        //alert(imageId);
        var numberOfAnswersname="answers"+questionId;//gets the id of the <p> tag that displays the number of comments for this meme
        //alert(numberOfCommentsname);
        var getnumber=(document.getElementById(numberOfAnswersname).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var numberOfAnswers = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }

        if(confirm("Do you really wish to delete this answer?"))
        {   
            //deletecomment=true;
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deleteanswers.php',
                data: 
                {
                    answerId:answerId,
                    numberOfAnswers:numberOfAnswers,
                    questionId:questionId
                },
                success: function (response) 
                {                    
                    //alert("deleting"); 
                    //alert(response);
                    if(response=="success")     
                    {        
                        $(self).parent().remove();//removes the entire div that contains this comment.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                        document.getElementById(numberOfAnswersname).innerHTML="Number Of Answers:"+(numberOfAnswers-1); 
                    }  
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//delete answer reply system using Ajax
$(document).ready(function(){
    $('body').on('click', '.deleteanswerreplybutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var replyId=$(this).attr("name");
        var answerId=$(this).attr("id");
        //alert(commentId);
        //var numberOfReplies=parseInt(document.getElementById("numberOfReplies"+commentId).innerHTML.substr((document.getElementById("numberOfReplies"+commentId).innerHTML).length-1));//this gets the number of replies for the comment whose reply is being deleted
        //alert(numberOfReplies);
        var getnumber=(document.getElementById("numberOfReplies"+answerId).innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
        if(getnumber){
            var numberOfReplies = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
        }
        numberOfReplies-=1;
        if(confirm("Do you really wish to delete this reply?"))
        {   
            //alert("hello b");
            var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'deleteanswerreply.php',
                data: 
                {
                    replyId:replyId,
                    numberOfReplies:numberOfReplies
                },
                success: function (response) 
                {                    
                    //alert("deleting");              
                    $(self).parent().remove();//removes the entire div that contains this reply.. the .parent() function is used since even the delete button lies in this div hence, the div becomes the button's parent
                    document.getElementById("numberOfReplies"+answerId).innerHTML="Number of Replies: "+(numberOfReplies);//reduces number of replies by one on webpage for this comment
                    //alert("response delete="+response);
                    if(numberOfReplies==0){
                        $(".answerrepliestogglebutton[name="+answerId+"]").toggle();
                        //removes the replies toggle button once all the replies have been deleted
                    }
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//adding <img> tags in the textarea to include links of external images
$(document).ready(function(){
    $('body').on('click', '.includeExternalImageButton', function(e){ 
        e.preventDefault();

        var textareaId=$(this).attr("name");
        //alert(textareaId);
        //alert(document.getElementById(textareaId).value);
        document.getElementById(textareaId).value+='<img src="(paste link here)" style="height:300px;width:300px"></img><br>';//add <img> tags to the textarea
    })
});

//adding <a> tags in the textarea to include links of external images
$(document).ready(function(){
    $('body').on('click', '.includeLinkButton', function(e){ 
        e.preventDefault();

        var textareaId=$(this).attr("name");
        //alert(textareaId);
        //alert(document.getElementById(textareaId).value);
        document.getElementById(textareaId).value+='<a href="(paste link here)">(paste link name here)</a><br>';//add <img> tags to the textarea
    })
});

//Search user system(in user profiles) using Ajax
$(document).ready(function(){
    $('body').on('submit', '.userprofile_username_search', function(e){ 
        
        var search=document.getElementById("searchtext").value;
        //alert("search="+search);
        var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
        $.ajax
        ({
            type: 'POST',
            url: 'usernamesearch.php',
            data: 
            {
                search:search
            },
            success: function (response) 
            { 
                response = JSON.parse(response);
                //alert("response="+response);
                var array_length = Object.keys(response).length;//getting array length          
                //alert("array length="+array_length);
                //linebreak = document.createElement("br");//creating a variable which stores an html line break tag 
                //queryForm.appendChild(linebreak);

                if(document.getElementById("searchusers").style.display=="none"){
                    document.getElementById("searchusers").style.display="block";
                }
                
                $(".searchtogglebutton").toggle();
                document.getElementById("usersearchMessage").innerHTML="Showing top 10 results.";
                var counter=0;
                for(var i=0;i<array_length;i++){
                    //alert("response new="+response[0].username);
                    if(counter<=10)
                    {
                       if(i==0){
                            document.getElementById("usersearchresultsdiv").innerHTML="<a href=userprofile.php?id="+response[0].id+"><div class='social-search-result'><p id='usersearchresults' >"+response[0].username+"</p></div></a>";//i=0
                        }else{
                            document.getElementById("usersearchresultsdiv").innerHTML+="<a href=userprofile.php?id="+response[i].id+"><div class='social-search-result'><p id='usersearchresults' >"+response[i].username+"</p></div></a>";
                        } 
                    }
                    else{
                        break;
                    }
                    counter+=1;

                    /*
                        if(i==0){
                            document.getElementById("usersearchresultsdiv").innerHTML="<div class='social-search-result'>
                                                                                            <a class='usersearchresults' href='userprofile.php?id="+response[0].id+"'>"+response[0].username+"</a>
                                                                                         </div>";//i=0
                        }else{
                            document.getElementById("usersearchresultsdiv").innerHTML+="<div class='social-search-result'>
                                                                                            <a class='usersearchresults' href='userprofile.php?id="+response[i].id+"'>"+response[i].username+"</a>
                                                                                        </div>";
                        } 
                    */
                    
                    //document.getElementById("usersearchresults").appendChild(linebreak);//puts a line break
                }
                
                
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
     
    return false;
    })
});

//Search user system(everywhere that is using the top search box) using Ajax
$(document).ready(function(){
//$(window).on('load', function() {
    $(".searchBarForm").submit(function(e){ 
        e.preventDefault();
        //alert("ala re");
        var search=document.getElementsByClassName("search")[0].value;
        //alert("search="+search);
        var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
        $.ajax
        ({
            type: 'POST',
            url: 'usernamesearch.php',
            data: 
            {
                search:search
            },
            success: function (response) 
            { 
                
                //alert(document.getElementsByName("resultArray")[0].value);
                document.getElementsByName("resultArray")[0].value=response;
                //alert(document.getElementsByName("resultArray")[0].value);

                $(".searchResultsArrayForm").submit();
                
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
     
    return false;
    })
});

//Send friend request
$(document).ready(function(){
    //alert(sessionId);
    $(".sendfriendrequestform").submit(function(e){ 
        e.preventDefault();alert("dfghj");
        if(confirm("Do you really wish to send a friend request to this user?")){
            var formData = new FormData(this);
            
            
            $.ajax
            ({
                type: 'POST',
                url: 'sendfriendrequest.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    if(response.trim()=="success"){
                        document.getElementsByClassName("friendrequeststatus")[0].innerHTML="Friend Request Sent!";
                        $(".sendfriendrequestform").toggle();//hides the friend request form once the request has been sent
                    }
                    
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//accept friend request
$(document).ready(function(){
    //alert(sessionId);
    $(".acceptfriendrequestform").submit(function(e){ 
        e.preventDefault();
        //alert(this);
        if(confirm("Do you really wish to accept the friend request from this user?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            var id=$(document.activeElement).attr('id');//gets the id of the form
            alert(id);
            $.ajax
            ({
                type: 'POST',
                url: 'acceptfriendrequest.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    alert(response);
                    response = JSON.parse(response);
                    //response contains an associative array having the friend request sender's username and his userid   
                    var sender_id=response.sender_user_id;
                    var sender_name=response.sender_username;  
                    document.getElementById("friendrequeststatus"+id).innerHTML="<a href='userprofile.php?id="+sender_id+"'>"+sender_name+"'s</a> Friend Request Accepted!";
                    
                    var friends_array=document.getElementsByClassName("friends");//gets the contents of the div where all the friends' names are listed
                    if(friends_array[0].innerHTML=="No friends yet!"){
                        document.getElementsByClassName("friends")[0].innerHTML="<p class='friends'><a href='userprofile.php?id="+sender_id+"'>"+sender_name+"</a></p>";
                    }
                    else{
                        document.getElementsByClassName("all_friends_div")[0].innerHTML="<p class='friends'><a href='userprofile.php?id="+sender_id+"'>"+sender_name+"</a></p>"+document.getElementsByClassName("friends_div")[0].innerHTML;
                    }
                    
                    $("#acceptfriendrequestform"+id).hide();//hides the accept friend request form once the request has been sent
                    $("#rejectfriendrequestform"+id).hide();//hides the reject friend request form once the request has been sent                   
                    
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//reject friend request
$(document).ready(function(){
    //alert(sessionId);
    $(".rejectfriendrequestform").submit(function(e){ 
        e.preventDefault();
        //alert(this);
        if(confirm("Do you really wish to reject the friend request from this user?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            var id=$(document.activeElement).attr('id');//gets the id of the form
            //alert(id);
            $.ajax
            ({
                type: 'POST',
                url: 'rejectfriendrequest.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);
                    response = JSON.parse(response);
                    //response contains an associative array having the friend request sender's username and his userid   
                    var sender_id=response.sender_user_id;
                    var sender_name=response.sender_username;  
                    document.getElementById("friendrequeststatus"+id).innerHTML="<a href='userprofile.php?id="+sender_id+"'>"+sender_name+"'s</a> Friend Request Rejected!";
                                        
                    $("#acceptfriendrequestform"+id).hide();//hides the accept friend request form once the request has been sent
                    $("#rejectfriendrequestform"+id).hide();//hides the reject friend request form once the request has been sent
                                       
                    
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//remove friend from friends list function
function removefriendFunction(friendRequestId){
    if(confirm("Do you really wish to remove this user from your friends' list?")){

        if (window.XMLHttpRequest) {                
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                Ajaxresponse=xmlhttp.responseText;//the response from likesystem.php is obtained by "xml.responseText" and stored in the variable Ajaxresponse
                //alert("Ajaxresponse="+Ajaxresponse);

                if(Ajaxresponse=="success"){
                    //alert("Removed user from Friends' List!");
                    $("#friend"+friendRequestId).remove();
                }
            }
        }
        
        parameters="friend_request_id="+friendRequestId;

        xmlhttp.open("POST","removefromfriendslist.php",true);
        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');//this has to be written as it is
        xmlhttp.send(parameters);
    }   
    
}

//this is to show the search for users bar and the search div
$(document).ready(function(){
    $('body').on('click', '.searchtogglebutton', function(){ 
        //var divname="#allreplies"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
        $('.searchtogglebutton').hide();
        $(".searchusers").toggle();  
        /*if($(divname).css('display')!="none"){//that is, if reply boox is opened-only then scroll, else, dont scroll
            $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it     
        }*/
    });
});

//this is to show the friend requests div
$(document).ready(function(){
    $('body').on('click', '.friendrequeststogglebutton', function(){ 
        //var divname="#allreplies"+$(this).attr("name");//here, we get the name of the div which is being toggled..this is done by getting the value inside the "name" attribute of the show all replies button..this attribute for every button is the comment id for which the reply has been posted...we add the comment id at the end of "allreplies" and this makes the class name of the div containing all the replies for that particular comment
        $(".friendrequests").toggle();  
        /*if($(divname).css('display')!="none"){//that is, if reply boox is opened-only then scroll, else, dont scroll
            $("html, body").animate({ scrollTop: $(divname).offset().top }, 1000); //scroll to it     
        }*/
    });

});

//this is to show the make new group form
$(document).ready(function(){
    $('body').on('click', '.showMakeNewGroupFormButton', function(){ 
        $('.cover-page').toggle();
        $(".make_group_div").toggle(); 
        $(window).click(function(event){
            if($(event.target).hasClass('cover-page')){
                $('.cover-page').hide();
                $('.make_group_div').hide();
            }
        });
    });
});




//this is to show the pending group invites tab
$(document).ready(function(){
    $('body').on('click', '.groupInvitesToggleButton', function(){ 
        $(".view_pending_group_invites").toggle();  
    });
});

//function which displays all the form elements in make a new group div
function showGroupElements(){
    //$(".group_input").toggle(); 
    var group_inputs=document.getElementsByClassName("group_input"); 
    for ( i = 0; i < group_inputs.length; i += 1) {
        group_inputs[i].style.display = "block";       
    }
}
////////////////////////////////////////////////////////////////////////
var group_friends_array=[];
//new group creation
$(document).ready(function(){
    //alert(sessionId);
    $(".newGroupCreationForm").submit(function(e){ 
        e.preventDefault();
        //alert(this);        
        if(confirm("Do you really wish to create a new group?")){
            var friends_array=JSON.stringify(group_friends_array);
            var formData = new FormData(this);
            formData.append('friends_array',friends_array);
            //var id = formData.find('input[type="submit"]');
            //var id=$(document.activeElement).attr('id');//gets the id of the form
            //alert(id);
            $.ajax
            ({
                type: 'POST',
                url: 'newFriendsGroupCreation.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    if(response=="no groupname"){
                        document.getElementById("groupMakingOutput").innerHTML="Please enter a group name!";
                    }
                    else if(response=="no participants"){
                        document.getElementById("groupMakingOutput").innerHTML="Please select at least one friend's name to send an invite for the group!"
                    }
                    else{
                        //alert(response);
                        document.getElementById("groupMakingOutput").innerHTML="Group created and invitations sent!";
                        document.getElementById("groupNameTextbox").value="";//reseting group name textbox

                        //unchecking all checkboxes
                        var checkboxlist=document.getElementsByClassName("groupInviteCheckbox");
                        for(var i=0;i<checkboxlist.length;i++){
                            checkboxlist[i].checked=false;
                        }

                        var x=document.getElementsByClassName("allmeagles");
                        if(x[0].innerHTML.trim()=="<p>You are not a participant of any group!</p>"){
                            x[0].innerHTML=response;
                        }else{
                            x[0].innerHTML=response+x[0].innerHTML;
                        }
                        
                    }
                    group_friends_array=[];//resetting the friends list array
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//Friends' name autocomplete system

$(document).ready(function(){
    //alert(sessionId);
    $("#friends_name_form").keyup(function(e){ 
        e.preventDefault();
        var friend_name=document.getElementById("friends_name_form").value;
        //alert(friend_name);       
        $.ajax
        ({
            type: 'POST',
            url: 'friends_name_autocomplete_system.php',
            data:{friend_name:friend_name},                             
            success: function (response) 
            {
                //alert(response);
                document.getElementById("friends_names_autocomplete_suggestions").innerHTML=response;

                for(var i=0;i<group_friends_array.length;i++)
                {
                    var elements=document.getElementsByClassName("groupInviteCheckbox");
                    for(var j=0;j<elements.length;j++)
                    {
                        if(group_friends_array[i]==elements[j].value)
                        {
                            elements[j].checked = true;
                        }
                    }
                    
                }
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
            
        return false;        
    })
});

$(document).ready(function(){

    //$('.groupInviteCheckbox').on('change', 'input', function() {
        $('body').on('change', '.groupInviteCheckbox', function() {
        //alert("hey");
        if($(this).is(':checked')){
           // alert("yes");
            //alert($(this).val());
            group_friends_array.push($(this).val());

        }else{
            //alert("no");
            //alert($(this).val());
            var index = group_friends_array.indexOf($(this).val());
            group_friends_array.splice(index, 1);
        }
        //alert("ar="+group_friends_array);
    });
});

//closing of make group modal box
/*if(!$('click'.target).is('#make_group_div'))
{
    if(document.getElementById("make_group_div").style.display!="none"){
        $(this).toggle();
    }
    
}*/
//////////////////////////////////////////////////////////////////
//Send group invites from group page part
var friend_invites_array=[];
//new group creation
$(document).ready(function(){
    //alert(sessionId);
    $(".sendGroupInvitesForm").submit(function(e){ 
        e.preventDefault();
        //alert(this);                
        var friends_array=JSON.stringify(friend_invites_array);
        var formData = new FormData(this);
        formData.append('friends_array',friends_array);
        //var id = formData.find('input[type="submit"]');
        //var id=$(document.activeElement).attr('id');//gets the id of the form
        //alert(id);
        $.ajax
        ({
            type: 'POST',
            url: 'sendGroupInvites.php',
            data:formData,
            //dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {
                //alert(response);
                if(response=="no participants"){
                    document.getElementById("invitationSendingOutput").innerHTML="Please select at least one friend's name to send an invite for the group!"
                }
                else{
                    //alert(response);

                    document.getElementById("invitationSendingOutput").innerHTML="Invitations sent!";
                    document.getElementById("numberOfPendingInvitations").innerHTML="Number of pending Invitations: "+response;
                    //toggling all checkboxes
                    /*var checkboxlist=document.getElementsByClassName("groupFriendInviteCheckbox");
                    for(var i=0;i<checkboxlist.length;i++){
                        checkboxlist[i].style.display="none";
                        checkboxlist[i].parentElement.style.display="none";
                    }*/
                    //alert("friend_invites_array.length"+friend_invites_array.length);
                    for(var i=0;i<friend_invites_array.length;i++)
                    {
                        var elements=document.getElementsByClassName("groupFriendInviteCheckbox");
                        for(var j=0;j<elements.length;j++)
                        {
                            if(friend_invites_array[i]==elements[j].value)
                            {
                                if(elements[j].checked== true)
                                {   //alert("checked");
                                    elements[i].style.display="none";
                                    elements[i].parentElement.style.display="none";
                                }
                            }
                        }
                        
                    }
                    
                }
                friend_invites_array=[];//resetting the friends list array
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
        
        return false;
    })
});

//Friends' name autocomplete system

$(document).ready(function(){
    //alert(sessionId);
    $("#friends_name_form").keyup(function(e){ 
        e.preventDefault();
        var friend_name=document.getElementById("friends_name_form").value;
        var groupId=document.getElementById("groupId").value;
        //alert(friend_name);       
        $.ajax
        ({
            type: 'POST',
            url: 'groupspage_friends_name_autocomplete_system.php',
            data:{friend_name:friend_name,groupId:groupId},                             
            success: function (response) 
            {
                //alert(response);
                document.getElementById("groupspage_friends_names_autocomplete_suggestions").innerHTML=response;

                for(var i=0;i<friend_invites_array.length;i++)
                {
                    var elements=document.getElementsByClassName("groupFriendInviteCheckbox");
                    for(var j=0;j<elements.length;j++)
                    {
                        if(friend_invites_array[i]==elements[j].value)
                        {
                            elements[j].checked = true;
                        }
                    }
                    
                }
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
            
        return false;        
    })
});

$(document).ready(function(){

    //$('.groupInviteCheckbox').on('change', 'input', function() {
        $('body').on('change', '.groupFriendInviteCheckbox', function() {
        //alert("hey");
        if($(this).is(':checked')){
            //alert("yes");
            //alert($(this).val());
            friend_invites_array.push($(this).val());

        }else{
            //alert("no");
            //alert($(this).val());
            var index = friend_invites_array.indexOf($(this).val());
            friend_invites_array.splice(index, 1);
        }
        //alert("fr="+friend_invites_array);
    });
});

/////////////////////////////////////////////////////////////////////
//accept group invite
$(document).ready(function(){
    //alert(sessionId);
    $(".acceptGroupInviteForm").submit(function(e){ 
        e.preventDefault();
        //alert(this);
        if(confirm("Do you really wish to accept this group invitation?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            
            var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                var inviteId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //inviteId gets the id of the form which is the invitation id
            $.ajax
            ({
                type: 'POST',
                url: 'acceptgroupinvite.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);                    
                    
                    
                    
                    $("#acceptGroupInviteForm"+inviteId).toggle();//hiding accept group invite form
                    $("#rejectGroupInviteForm"+inviteId).toggle();//hiding reject group invite form

                    if(document.getElementById("invitation-prompt")){
                        document.getElementById("invitation-prompt").innerHTML="Group Invite Accepted!";
                    }
                    else{
                        document.getElementById("acceptOrRejectGroupInvite"+inviteId).innerHTML="Group Invite Accepted!";
                        var x=document.getElementsByClassName("allmeagles");
                        //alert(x[0].innerHTML);
                        if(x[0].innerHTML.trim()=="<p>You are not a participant of any group!</p>"){
                            x[0].innerHTML=response;
                        }else{
                            x[0].innerHTML=response+x[0].innerHTML;
                        }
                    }
                    
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//reject group invite
$(document).ready(function(){
    //alert(sessionId);
    $(".rejectGroupInviteForm").submit(function(e){ 
        e.preventDefault();
        //alert(this);
        if(confirm("Do you really wish to reject this group invitation?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            
            var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                var inviteId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //inviteId gets the id of the form which is the invitation id
            $.ajax
            ({
                type: 'POST',
                url: 'rejectgroupinvite.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);                    
                    
                    document.getElementById("acceptOrRejectGroupInvite"+inviteId).innerHTML="Group Invite Rejected!";
                    
                    $("#acceptGroupInviteForm"+inviteId).toggle();//hiding accept group invite form
                    $("#rejectGroupInviteForm"+inviteId).toggle();//hiding reject group invite form
                    
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//this is to view all group participants on groupspage.php
$(document).ready(function(){
    $('body').on('click', '.viewGroupParticipantsButton', function(){ 
        $(".group_participants").toggle();  
    });
});

//update profile picture
$(document).ready(function(){
    //alert(sessionId);
    $(".updateGroupPicForm").submit(function(e){ 
        e.preventDefault();
        var formData = new FormData(this);
            $.ajax
            ({
                type: 'POST',
                url: 'updateGroupPic.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {
                    //alert("ikde ala re!");
                    //alert(response);
                    if(response.trim()==="no file selected"){
                        document.getElementById("updateGroupPicError").innerHTML="No file selected!";
                    }
                    else if(response.trim()==="file too large"){
                        document.getElementById("updateGroupPicError").innerHTML="The file you selected is too large! Max file size is 6MB";
                    } 
                    else if(response.trim()==="wrong file type"){
                        document.getElementById("updateGroupPicError").innerHTML="Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                    }
                    else{
                        $("#group_dp").attr('src',response.trim());
                    }
                },                
                error: function(xhr, status, error) {
                    //alert(xhr.responseText);
                }              
            });
         
        return false;
    })
});


//checking and disabling all checkboxes on clicking of share meme with the world checkboxesvar checkboxlist=document.getElementsByClassName("groupInviteCheckbox");
/*$(document).ready(function(){
    $('body').on('click', '.allWorldVisibiltyCheckbox', function(){ 
        var checkboxlist=document.getElementsByClassName("memeSharingCheckbox");
    
        var atleastOneChecked=false;
        for(var i=0;i<checkboxlist.length;i++){
            if(checkboxlist[i].checked==true){
                atleastOneChecked=true;
                break;
            }
        }
        if(atleastOneChecked==true && $(this).is(":checked")==false){
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=false;
            }
        }else{
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=true;
            }
        }
        

    });
});*/

//checking and disabling all checkboxes on clicking of share meme within every group
$(document).ready(function(){
    $('body').on('click', '.allGroupsVisibiltyCheckbox', function(){ 
        var checkboxlist=document.getElementsByClassName("groupVisibilityCheckbox");
        //alert("all groups");
        var atleastOneChecked=false;
        for(var i=0;i<checkboxlist.length;i++){
            if(checkboxlist[i].checked==true){
                atleastOneChecked=true;
                break;
            }
        }
        if(atleastOneChecked==true && $(this).is(":checked")==false){
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=false;
            }
        }else{
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=true;
            }
        }
    });
});

//checking and disabling all checkboxes on clicking of share meme with all friends
$(document).ready(function(){
    $('body').on('click', '.allFriendsVisibiltyCheckbox', function(){ 
        var checkboxlist=document.getElementsByClassName("friendVisibilityCheckbox");
        //alert("all uers");
        var atleastOneChecked=false;
        for(var i=0;i<checkboxlist.length;i++){
            if(checkboxlist[i].checked==true){
                atleastOneChecked=true;
                break;
            }
        }
        if(atleastOneChecked==true && $(this).is(":checked")==false){
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=false;
            }
        }else{
            for(var i=0;i<checkboxlist.length;i++){
                checkboxlist[i].checked=true;
            }
        }
    });
});

//function which displays the allFriendsVisibiltyCheckbox if there is atleast one friend of the user during meme upload
/*function showSelectAllFriendsOption(){
    //$(".group_input").toggle(); 
    var checkbox=document.getElementsByClassName("allFriendsVisibiltyCheckbox"); 
    //for ( i = 0; i < group_inputs.length; i += 1) {
        checkbox[0].style.display = "inline";       
    //}
}*/

//make group admin form
$(document).ready(function(){
    //alert(sessionId);
    $(".makeGroupAdminForm").submit(function(e){ 
        e.preventDefault();
        //alert(this);
        if(confirm("Do you really wish to make this user the group admin?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            
            var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                var participantId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //participantId gets the id of the participant who is being made the group's admin
            $.ajax
            ({
                type: 'POST',
                url: 'makegroupadmin.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {               
                    //alert(response);                 
                    $("#makeGroupAdminForm"+participantId).toggle();//hiding make group admin invite form
                    $("#groupAdminLabel"+participantId).toggle();//showing GROUP ADMIN label
                                        
                },                
                error: function(xhr, status, error) {
                    //alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

//exit group form
$(document).ready(function(){
    //alert(sessionId);
    $(".exitGroupForm").submit(function(e){ 
        e.preventDefault();
        //alert("ithe ahe");
        if(confirm("Do you really wish to exit this group?")){
            var formData = new FormData(this);
            //var id = formData.find('input[type="submit"]');
            
            var getnumber=($(this).attr('id')).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
            if(getnumber){
                var participantId = parseInt(getnumber[0]);//converts the number which is stored in the form of string to an integer
            }
            //participantId gets the id of the participant who is being made the group's admin
            $.ajax
            ({
                type: 'POST',
                url: 'exitgroupsystem.php',
                data:formData,
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {               
                    alert(response); 
                    if(response=="no more admins"){
                        var x=document.getElementsByClassName("exitGroupMessageLabel");
                        x[0].innerHTML="Since you're the sole admin, you need to make another user the admin before you leave the group!";
                    }
                    else if(response=="hacken")
                    {
                        //alert("hacken");
                    }   
                    else{ 
                        var x=document.getElementsByClassName("exitGroupMessageLabel");
                        x[0].innerHTML="Group Left. You can no longer post memes here.";
                        $("#groupMember"+participantId).remove();//removes the users name from the group participants' list
                        
                        //the following lines reduce the number of participants' label by 1
                        var getnumber1=(document.getElementsByClassName("groupNumberOfParticipants")[0].innerHTML).match(/\d+$/);//gets the number at the end of the string and then stores it in the zeroth position of an array
                        if(getnumber1){
                            var numberOfParticipants = parseInt(getnumber1[0]);//converts the number which is stored in the form of string to an integer
                        }
                        document.getElementsByClassName("groupNumberOfParticipants")[0].innerHTML="Number of participants: "+(numberOfParticipants-1);

                        $(".exitGroupForm").toggle();


                    }             
                                      
                },                
                error: function(xhr, status, error) {
                    //alert(xhr.responseText);
                }              
            });
        }
        return false;
    })
});

function showThisElement(elementClass){
    //on being called, toggles the element with the class name elementClass
    $("."+elementClass).toggle();
}

/*$(document).ready(function(){
    $(".tabs").tabs();
    $('body').on('click', '#reshuffleButton', function(){  
        var index = $(".tabs").tabs("option", "active");        
        $(".tabs").tabs("load", index);
    });
});
*/

/*$(document).ready(function(){
    $( "#tabs" ).tabs();
    $( "#inner-tabs" ).tabs();

    $('body').on('click', '#reshuffleButton', function(){ 
        alert("asasd");
        var x = $("#tabs").tabs("option", "active");
        alert(x);        
        $("#tabs").tabs("load", x);
    });
});*/

//this jquery is for the tabs
$(document).ready(function(){

    var tabs= $('.tabs');

    $('.tab').hide();

    tabs.find('a').on('click', function(e){
        e.preventDefault();
        tabs.find('.current').removeClass('.current');
        $(this).addClass('current');
        $(this.hash).show().siblings().hide();
    }).first().click();

});

//this jquery is for the inner-tabs 
$(document).ready(function(){
    var tabsinner= $('.inner-tabs');

    $('.inner-tab').hide();

    tabsinner.find('a').on('click', function(e){
        e.preventDefault();
        tabsinner.find('.current').removeClass('current inner-current');
        $(this).addClass('current inner-current');
        $(this.hash).show().siblings().hide();
        //document.getElementsByClassName("inner-current")[0].style.textDecoration="underline #b522a8";
    }).first().click();

});

//shuffle ajax call
$(document).ready(function(){
    $('body').on('click', '.reshuffleButton', function(e){ 
        e.preventDefault();
        var buttonid=$(this).attr('id');
        if(confirm("Do you really wish to shuffle all memes?"))
        {   
            
            $.ajax
            ({
                type: 'POST',
                url: 'shuffle_memes_system.php',                
                success: function (response) 
                {                    
                    //alert(response);
                    //document.getElementById("shuffled_inner_wrapper").innerHTML=response;
                    document.getElementById("shuffled_content_div").innerHTML=response;
                    //alert(buttonid);
                    /*if(buttonid=="savagePageShuffle")
                    {
                        document.getElementById("savage_page_shuffle_loadmore_form").style.display="block";
                        $.ajax({
                            type: "post",
                            url: "resetSessionVariable.php",
                            data: {sessionvariable:"savage_page_shuffle_counter"},
                            success: function (data) {
                                alert("done");
                            }
                        });
                    }
                    else*/
                    if(buttonid=="indexPageShuffle")
                    {
                        document.getElementById("index_page_shuffled_loadmore_form").style.display="block";
                        $.ajax({
                            type: "post",
                            url: "resetSessionVariable.php",
                            data: {sessionvariable:"index_page_shuffle_counter"},
                            success: function (data) {
                                //alert("done");
                            }
                        });
                    }
                    
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});

//flag memes system using Ajax
$(document).ready(function(){
    $('body').on('click', '.flagimagebutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var imageId=$(this).attr("name");
        $('.meme-box'+imageId).toggle();
        $('.flag-message'+imageId).toggle();
        //scroll up a bit on clicking flag button
        var y = $(window).scrollTop();  //your current y position on the page
        $(window).scrollTop(y-150);
        //alert(imageId);        
    })
});

$(document).ready(function(){
    $('body').on('submit', '.flag-form', function(e){ 
        e.preventDefault();
        //if(confirm("Do you really wish to send an invite?")){
            var formData = new FormData(this);                 
            var imageId=$(this).attr("name");  
            //alert(imageId);
            $.ajax
            ({
                type: 'POST',
                url: 'flagimage.php',
                data:formData,                
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {     
                    if(response=="success"){
                        $(".flag-message"+imageId).toggle();
                        $(".final-flag-message"+imageId).toggle();
                    }        
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
            return false;
        //}
    })
});

//flag questions system using Ajax
$(document).ready(function(){
    $('body').on('click', '.flagquestionbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var questionId=$(this).attr("name");
        //alert(questionId);
        $('.question-meme'+questionId).toggle();
        $('.flag-question-message'+questionId).toggle();
        //scroll up a bit on clicking flag button
        var y = $(window).scrollTop();  //your current y position on the page
        $(window).scrollTop(y-150);
        //alert(question);        
    })
});

$(document).ready(function(){
    $('body').on('submit', '.flag-question-form', function(e){ 
        e.preventDefault();
        //if(confirm("Do you really wish to send an invite?")){
            var formData = new FormData(this);                 
            var question=$(this).attr("name");  
            //alert(question);
            $.ajax
            ({
                type: 'POST',
                url: 'flagquestion.php',
                data:formData,                
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {     
                    if(response=="success"){
                        $(".flag-question-message"+question).toggle();
                        $(".final-question-flag-message"+question).toggle();
                    }        
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
            return false;
        //}
    })
});
/*
$(document).ready(function(){
    $('body').on('click', '.flagquestionbutton', function(e){ 
        e.preventDefault();
        //alert("hello gndu");
        var questionId=$(this).attr("name");
        

        if(confirm("Do you really wish to flag this question?"))
        {               
            //alert("hello b");
            //var self=this;//this done because $(this) doesnot work inside the "success" part in the ajax call
            $.ajax
            ({
                type: 'POST',
                url: 'flagquestion.php',
                data: 
                {                    
                    questionId:questionId
                },
                success: function (response) 
                {                    
                    if(response=="success"){
                        document.getElementById("flagquestion"+questionId).innerHTML="Flagged";
                        $("#questionFlagButton"+questionId).toggle();
                    }
                    
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});
*/
//invite to meagl form
$(document).ready(function(){
    $('body').on('submit', '.inviteToMeagl', function(e){ 
        e.preventDefault();
        if(confirm("Do you really wish to send an invite?")){
            var formData = new FormData(this);                 
            document.getElementById("inviteToMeaglMessage").innerHTML="Processing...This shall take a few moments...";   
            $.ajax
            ({
                type: 'POST',
                url: 'inviteToMeaglSystem.php',
                data:formData,                
                cache: false,
                contentType: false,
                processData: false,                
                success: function (response) 
                {   //alert(response);          
                    if(response=="success"){
                        document.getElementById("inviteToMeaglMessage").innerHTML="Invitation sent! Thanks for spreading the message!";
                    }
                    else if(response=="already a member"){
                        document.getElementById("inviteToMeaglMessage").innerHTML="This person is already a member of Meagl";
                    } 
                    document.getElementById("inviteToMeaglTextBox").value="";                     
                },                
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
         
            return false;
        }
    })
});

//sign-up form
$(document).ready(function(){
    $('body').on('submit', '.signupForm', function(e){ 
        e.preventDefault();
        //alert("egrgeg");
        var formData = new FormData(this);      
        $.ajax
        ({
            type: 'POST',
            url: 'signuph.php',
            data:formData,                
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {   
                //alert(response); 
                //alert("fefef");
                if(response=="signup username error")
                {
                    document.getElementById("signInError").innerHTML="Another user already has this username, please pick another one!";
                }else if(response=="signup email error")
                {
                    document.getElementById("signInError").innerHTML="This email is already present!";
                }else if(response=="not all filled"){
                    //alert("ithe");
                    document.getElementById("signInError").innerHTML="Please fill all required fields";
                }else if(response=="invalid invitation code"){
                    //alert("ithe");
                    document.getElementById("signInError").innerHTML="Your invitation code is invalid!";
                }
                else{
                    //alert("hey bi");
                    window.location.href=response;
                }
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
         
        return false;        
    })
});


//login form
$(document).ready(function(){
    $('body').on('submit', '.loginForm', function(e){ 
        e.preventDefault();
        //alert("egrgeg");
        var formData = new FormData(this);      
        $.ajax
        ({
            type: 'POST',
            url: 'loginh.php',
            data:formData,                
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {   
                //alert(response); 
                //alert("fefef");
                if(response=="login error")
                {
                    document.getElementById("logInError").innerHTML="Your username or password is incorrect!";
                
                }else if(response=="not all filled"){
                    //alert("ithe");
                    document.getElementById("logInError").innerHTML="Please fill all required fields";
                }
                else{
                    //alert("hey bi");
                    window.location.href=response;
                }
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
         
        return false;        
    })
});

//change password form
$(document).ready(function(){
    $('body').on('submit', '.change_password_form', function(e){ 
        e.preventDefault();
        //alert("egrgeg");
        var formData = new FormData(this);      
        $.ajax
        ({
            type: 'POST',
            url: 'changePasswordSystem.php',
            data:formData,                
            cache: false,
            contentType: false,
            processData: false,                
            success: function (response) 
            {   
                //alert(response); 

                if(response=="success")
                {
                    document.getElementById("changePasswordMessage").innerHTML="Password succesfully changed.";
                }else{
                    document.getElementById("changePasswordMessage").innerHTML="The passwords in the two fields don't match.";
                }
                document.getElementById("change_password_textarea_1").value="";
                document.getElementById("change_password_textarea_2").value="";
            },                
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }              
        });
         
        return false;        
    })
});

//edit status system
$(document).ready(function(){
    /*$('body').on('click', '#allowEditUserStatus', function(e){ 
        e.preventDefault();
        $(this).toggle();
        $("#userStatus").attr('contenteditable','true');
        $("#updateUserStatus").toggle();
    })*/
    //changes 3.0
    $('body').on('click', '#allowEditUserStatus', function(e){ 
        e.preventDefault();
        $(this).toggle();
        $("#userStatus").attr('contenteditable','true');
        $("#updateUserStatus").toggle();
        setTimeout(function() {
                $('#userStatus').focus();
            }, 0);
        $('#userStatus').css({
            'outline':'none',
        });

    });    
    //changes 3.0 end

});

$(document).ready(function(){
    $('body').on('click', '#updateUserStatus', function(e){ 
        e.preventDefault();
        var status=document.getElementById("userStatus").innerHTML;//fetched the edited text..that is the comment after editing it
        //$(comment).find('br').remove();
        status = status.replace(/\<br\>/g,"");//removes any <br> tags that might crop up in the edited text
        //alert(comment);
        if(status)
        {   //alert("hello b");
            $.ajax
            ({
                type: 'POST',
                url: 'updateUserStatus.php',
                data: 
                {
                    status:status
                },
                success: function (response) 
                {
                    //alert("hello madafaka");
                    if(response=="success")
                    {
                        document.getElementById("userStatus").innerHTML=status;
                    
                        $("#allowEditUserStatus").toggle();
                        $("#updateUserStatus").toggle();
                        $("#userStatus").attr('contenteditable','false');
                    }
                    
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }              
            });
        } 
        return false;
    })
});




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////~~~GAURAV's JavaSCRIPT~~~////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
     $('.display-edit').click(function(){
            console.log('We are inside the display edit');
            $(this).parent().next().toggle();
        });
    $('.dedicated-question').hover(function(){
        $('.deletequestionbutton').show();
    },function(){
        $('.deletequestionbutton').hide();
    });
    var h=$('.dedicated-question').height();
    $('.fame-box').height(h-200);
    $('.dedicated-answers-count').css({
        'margin-top':(h-100)/5-35,
        'margin-bottom':(h-100)/5-35,
    });
    $('.dedicated-views-count').css({
        'margin-top':(h-100)/5-35,
        'margin-bottom':(h-100)/5-35,
    });
    var title=$(this).attr('title');
    console.log(title);

    $('.proceed-link').click(function(){
        $('.meme').hide();
        $(this).hide();
        $('.upload-part-2').show();
        $('.go-back').show();
    });

     $('.go-back').click(function(){
        $('.upload-part-2').hide();
        $(this).hide();
        $('.meme').show();
        $('.proceed-link').show();
    });

    $('.notif').removeClass('addBackground');
    $('#recommendedmemes').addClass('borderi');
    $('.dp,.user-options').mouseenter(function(){
                $('.user-options').css('display','block');
                console.log('enter');
            }).mouseleave(function(){
                $('.user-options').css('display','none');
                console.log('exit');
            });
    /*$('body').on('click',function(event){
        console.log($(event.target).className);
        var clickClass=$(event.target).className;
        if(clickClass!='change-group-pic'&&clickClass!='final-change'&&clickClass!='full-change-pic'&&clickClass!='full-display'&&clickClass!='updateGroupPicForm'){
            $('.change-group-pic').hide();
        }
    });*/
    $('.group-dp-link').click(function(){

        $('.change-group-pic').show();
    });
    $('.close-btn').click(function(){
        $('.change-group-pic').hide();
    });
    //$('.notif-meme-heading').hide();
    if(title=="MEAGL")
    {
        $('.notifications-column').hide();
        var canvas=(document).getElementById('tab-bottom');
        
        var ctx=canvas.getContext('2d');
        
        ctx.beginPath();
            ctx.rect(0,4,$('#recommendedmemes').width()+13.5,canvas.height);
            ctx.rect(0,0,3,canvas.height);
            ctx.rect($('#recommendedmemes').width()+13.5,0,3,canvas.height-2);
            ctx.rect($('#recommendedmemes').width()+13.5,2,canvas.width,canvas.height-2);
            ctx.fillStyle="#b522a8";
            ctx.fill();

            var tOffset=$('.tabs').offset().top;
            var sHeight=$('.tabs').height()+10;
            var notif_height=$('.notifications-column').height();

            $(window).scroll(function(){
                var scrollYpos = $(document).scrollTop();
                if (scrollYpos > tOffset - sHeight) {

                    $(".tabs").css({
                        'position':'fixed',
                        'right':'440px',
                        'top': '50px',
                    });
                    $('.notifications-column').css({
                        'position':'fixed',
                        'top':'29px',
                    });
                    $('.notifications-body').css({
                    'max-height':notif_height+30,
                    });
                    $('.reshuffleButton').html('<span class="glyphicon glyphicon-refresh"></span>');
                    $('.reshuffleButton').css({
                        'position':'fixed',
                        'right':'1040px',
                        'top': '60px',
                    });
                    
                }
                
                 else {
                    $(".tabs").css({
                        'position':'absolute',
                        'top': '160px',
                    });
                    $('.notifications-column').css({
                        'position':'absolute',
                        'top':'140px',
                    });
                    $('.reshuffleButton').css({
                        'position':'relative',
                        'margin-left':'250px',
                        'top': '5px',
                        'right':'0px',
                    });
                    $('.reshuffleButton').html('Shuffle <span class="glyphicon glyphicon-refresh"></span>');
                }
            });

    $('#notifications').click(function(){
        $('.notif').removeClass('addBackground');
        $('.notifications-column').slideToggle();
    });

    /*$('.notif').hover(function(){
        $('.notif').removeClass('addBackground');
        $(this).addClass('addBackground');
    });*/

    $('.notif-link').click(function(){
        $('.recommendedmemes,.trendingmemes,.freshmemes,.tabs').hide();
        $(this).addClass('notif-meme-heading');

        
        
    });

    $('#recommendedmemes').click(function(){
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect(0,4,$(this).width()+13.5,canvas.height);
        ctx.rect(0,0,3,canvas.height);
        ctx.rect($(this).width()+13.5,0,3,canvas.height-2);
        ctx.rect($(this).width()+13.5,2,canvas.width,canvas.height-2);
        ctx.fillStyle="#b522a8";
        ctx.fill();
        $('#recommendedmemes:after').show();
        $('.recommendedmemes').show();
        $('.trendingmemes').hide();
        $('.freshmemes').hide();
        $(this).addClass('border');
        $('#trendingmemes').removeClass('border');
        $('#freshmemes').removeClass('border');
        $('#shuffle').removeClass('border');
    });
    $('.sign-out-trend').addClass('sign-out-class');
    $('.sign-out-trend').css({'color':'#666'});
    $('#trendingmemes').click(function(){
        $('#recommendedmemes').removeClass('borderi');
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect($('#recommendedmemes').width()+64.5,4,$(this).width()+40,canvas.height);
        ctx.rect($('#recommendedmemes').width()+61.5,0,3,canvas.height);
        ctx.rect(0,2,$('#recommendedmemes').width()+64.5,canvas.height-2);
        ctx.rect($('#recommendedmemes').width()+23,2,3,canvas.height-2);
        ctx.rect($('#recommendedmemes').width()+$(this).width()+84.5,2,canvas.width,canvas.height-2);
        ctx.rect($('#recommendedmemes').width()+$(this).width()+84.5,0,3,canvas.height-2);
        ctx.fillStyle="#b522a8";
        ctx.fill();
        $('.recommendedmemes').hide();
        $('.trendingmemes').show();
        $('.freshmemes').hide();
        $(this).addClass('border');
        $('#recommendedmemes').removeClass('border');
        $('#freshmemes').removeClass('border');
        $('#shuffle').removeClass('border');
        $('.sign-out-trend').removeClass('border');
        $(this).css({'color':'#666'});
        $('.sign-out-trend').addClass('sign-out-class');
        $('.sign-out-fresh').removeClass('sign-out-class');
        $('.sign-out-fresh').css({'color':'#aaa'});
    });

    $('#freshmemes').click(function(){
        $('#recommendedmemes').removeClass('borderi');
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+135,4,$(this).width()+40,canvas.height);
        ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+132,0,3,canvas.height);
        ctx.rect(0,2,$('#recommendedmemes').width()+$('#trendingmemes').width()+135,canvas.height-2);
        //ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+43,0,3,canvas.height);
        ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+$(this).width()+155,2,canvas.width,canvas.height-2);
        ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+$(this).width()+155,0,3,canvas.height);
        ctx.fillStyle="#b522a8";
        ctx.fill();
        $('.recommendedmemes').hide();
        $('.trendingmemes').hide();
        $('.freshmemes').show();
        $(this).addClass('border');
        $('#recommendedmemes').removeClass('border');
        $('#trendingmemes').removeClass('border');
        $('#shuffle').removeClass('border');
        $('.sign-out-fresh').removeClass('border');
        $(this).css({'color':'#666'});
        $('.sign-out-fresh').addClass('sign-out-class');
        $('.sign-out-trend').removeClass('sign-out-class');
        $('.sign-out-trend').css({'color':'#aaa'});
    });

    $('#shuffle').click(function(){
        $('#recommendedmemes').removeClass('borderi');
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect(0,2,canvas.width-$(this).width()-33,canvas.height-2);
        ctx.rect(canvas.width-$(this).width()-33,4,$(this).width()+23,canvas.height);
        ctx.rect(canvas.width-$(this).width()-34,0,3,canvas.height);
        ctx.rect(canvas.width-11,0,3,canvas.height);
        ctx.rect
        ctx.fillStyle="#b522a8";
        ctx.fill();
        $('.recommendedmemes').hide();
        $('.trendingmemes').hide();
        $('.freshmemes').hide();
        $(this).addClass('border');
        $('#recommendedmemes').removeClass('border');
        $('#trendingmemes').removeClass('border');
        $('#freshmemes').removeClass('border');
    });
    }

    $('#dropdown').click(function(){
        $('.header2').slideToggle("fast");
    });

    $("[type=text].search").focusin(function(){
        $('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').addClass('addBlur');
        $('.search-cover').show();
        $(this).addClass('modify-search-box');
    });

    $("[type=text]").focusout(function(){
        $('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').removeClass('addBlur');
        $('.search-cover').hide();
        //searchboxanimation()
        $(this).removeClass('modify-search-box');
    });
    /////////////////////////////////ALEAYS COMMENTed(START)////////////////////////////////////
    /*
    $('#memes-tab').click(function(){
        $('#memes-tab').addClass('addBorder');
        $('#memes-tab:after').addClass('changeBackground');
        $('.memes-tab-content').show();
        $('.subscriptions-tab-content').hide();
        $('.social-tab-content').hide();
    });

    $('#subscriptions-tab').click(function(){
        $('.memes-tab-content').hide();
        $('.subscriptions-tab-content').show();
        $('.social-tab-content').hide();
    });

    $('#social-tab').click(function(){
        $('.memes-tab-content').hide();
        $('.subscriptions-tab-content').hide();
        $('.social-tab-content').show();
    });*/
    /////////////////////////////////ALEAYS COMMENTed(END)////////////////////////////////////
    
    //(commented off for testing)

    if(title=="Savage"||title=="College / School"||title=="Sports"||title=="Celeb"||title=="Gaming"||title=="Comic"||title=="Politics"||title=="Just My Thoughts"||title=="Other")
    {
        $('.notifications-column').hide();
         $('#notifications').click(function(){
                $('.notif').removeClass('addBackground');
                $('.notifications-column').slideToggle();
        });
        $('.sign-out-trend').addClass('sign-out-class');$('.sign-out-trend').css({'color':'#666'});$('.sign-out-fresh').css({'color':'#aaa'});
        $('#trendingmemes').click(function(){
            $(this).addClass('sign-out-class');$('.sign-out-fresh').css({'color':'#aaa'});
            $('#freshmemes').removeClass("sign-out-class");$(this).css({'color':'#666'});
        });
        $('#freshmemes').click(function(){
            $(this).addClass('sign-out-class');$('.sign-out-trend').css({'color':'#aaa'});
            $('#trendingmemes').removeClass("sign-out-class");$(this).css({'color':'#666'});
        });
        var tOffset=$('.tabs').offset().top;
            var sHeight=$('.tabs').height()+10;
        $(window).scroll(function(){
                var scrollYpos = $(document).scrollTop();
                if (scrollYpos > tOffset - sHeight) {

                    $(".tabs").css({
                        'position':'fixed',
                        'right':'400px',
                        'top': '50px',
                    });
                    $('.category-div').css({
                        'margin-top':'60px',
                    });
                    $('.categ-notification-column').css({
                        'top':'40px',
                    });
                    
                }
                
                 else {
                    $(".tabs").css({
                        'position':'absolute',
                        'top': '120px',
                        'right':'400px',
                    });
                    $('.category-div').css({
                        'margin-top':'120px',
                    });
                    $('.categ-notification-column').css({
                        'top':'110px',
                    });
                }
            });
    }

    if(title=="My Home"){
    var canvas=(document).getElementById('tab-bottom');
    $('.subscriptions-tab-content').hide();
    $('.social-tab-content').hide();
    $('#memes-tab').addClass('addBorder');
    var ctx=canvas.getContext('2d');
        
    ctx.beginPath();
    ctx.rect(0,2,$('#memes-tab').width()+13.5,canvas.height);
    ctx.rect(0,0,3,canvas.height);
    ctx.rect($('#memes-tab').width()+13.5,0,canvas.width,canvas.height);
    ctx.fillStyle="#b522a8";
    ctx.fill();       
    $('#memes-tab').click(function(evt){
        evt.preventDefault();
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect(0,2,$(this).width()+13.5,canvas.height);
        ctx.rect(0,0,3,canvas.height);
        ctx.rect($(this).width()+13.5,0,canvas.width,canvas.height);
        ctx.fillStyle="#b522a8";
        ctx.fill();
        //$('#recommendedmemes:after').show();
        $('.memes-tab-content').show();
        $('.subscriptions-tab-content').hide();
        $('.social-tab-content').hide();
        $(this).addClass('border');
        $('#subscriptions-tab').removeClass('border');
        $('#social-tab').removeClass('border');
    });

    $('#subscriptions-tab').click(function(evt){
        evt.preventDefault();
        $('#memes-tab').removeClass('addBorder');
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect($('#memes-tab').width()+116,2,$(this).width()+40,canvas.height);
        ctx.rect(0,0,$('#memes-tab').width()+116,canvas.height);
        //ctx.rect($('#memes-tab').width()+23,0,3,canvas.height);
        ctx.rect($('#memes-tab').width()+$(this).width()+127,0,canvas.width,canvas.height);
        ctx.fillStyle="#b522a8";
        ctx.fill();
        $('.memes-tab-content').hide();
        $('.subscriptions-tab-content').show();
        $('.social-tab-content').hide();
        $(this).addClass('border');
        $('#memes-tab').removeClass('border');
        $('#social-tab').removeClass('border');
        $('.all-content').addClass('inner-add-class');
        $('.all-content-link').css({'color':'#5a5a5a'});
        console.log('in the sub tab');
        $('.all-content').click(function(){
            $('.all-content').addClass('inner-add-class');
            $('.subscribed-channels').removeClass('inner-add-class');
            $('.subscribed-categories').removeClass('inner-add-class');
            $('.all-content-link').css({'color':'#5a5a5a'});
            $('.subscribed-channels-link').css({'color':'#aaa'});
            $('.subscribed-categories-link').css({'color':'#aaa'});
        });
        $('.subscribed-channels').click(function(){
            $('.all-content').removeClass('inner-add-class');
            $('.subscribed-channels').addClass('inner-add-class');
            $('.subscribed-categories').removeClass('inner-add-class');
            $('.all-content-link').css({'color':'#aaa'});
            $('.subscribed-channels-link').css({'color':'#5a5a5a'});
            $('.subscribed-categories-link').css({'color':'#aaa'});
        });
        $('.subscribed-categories').click(function(){
            $('.all-content').removeClass('inner-add-class');
            $('.subscribed-channels').removeClass('inner-add-class');
            $('.subscribed-categories').addClass('inner-add-class');
            $('.all-content-link').css({'color':'#aaa'});
            $('.subscribed-channels-link').css({'color':'#aaa'});
            $('.subscribed-categories-link').css({'color':'#5a5a5a'});
        });
    });

    $('#social-tab').click(function(evt){
        /*if($('.friend-list').height()<280){
            console.log('less height');
            $('.make_group_div').height(300+$('.friend-list').height());
            console.log($('.friend-list').height());
            console.log($('.make_group_div').height());
        }*/
        evt.preventDefault();
        $('#memes-tab').removeClass('addBorder');
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.beginPath();
        ctx.rect(0,0,canvas.width-$(this).width()-36.5,canvas.height);
        ctx.rect(canvas.width-$(this).width()-36.5,2,$(this).width()+23,canvas.height);
        ctx.rect(canvas.width-13,0,3,canvas.height);
        ctx.rect
        ctx.fillStyle="#b522a8";
        ctx.fill();

        $('.social-tab-content').show();
        $('.memes-tab-content').hide();
        $('.subscriptions-tab-content').hide();
        $(this).addClass('border');
        $('#subscriptions-tab').removeClass('border');
        $('#memes-tab').removeClass('border');
        $('.close-group').click(function(){
            $('.cover-page').hide();
                $('.make_group_div').hide();
        });
    });
    
    $('#notif-tab').click(function(){
            $('#notifications-tab').toggle();   
    });
    }
////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////oti///////////////
////////////////////////////////////////////////////////////////////////////////////////

    if(title=="Meme Maker")
    {
    var clickno=0,oncedone=0,half_width_pressed=0;
    $('.dragger').hide();
    var width_i=$('#workstation-meme').width();
    var height_i=$('#workstation-meme').height();
    function showbutton(){
        if(clickno===0){
            fromtop = ($('#workstation-meme').height())/2;
            fromleft=($('#workstation-meme').width())/2;
            adjustButtons(fromtop,fromleft);
            $('.dragger').show();
            console.log('hey0');
            if(oncedone===1){
                $('#workstation-meme').resizable("enable");
            }

            $('#workstation-meme').resizable({
                handles:'s',

                resize: function(event,ui){
                    if(half_width_pressed===1){
                        ui.size.width=width_i/2;
                    }
                    else{
                        ui.size.width=width_i;
                    }
                    
                    fromtop=ui.size.height/2;
                    fromleft=ui.size.width/2;
                    adjustButtons(fromtop,fromleft);
                    console.log('hey');
                    oncedone=1;
                }
            });

            clickno=1;
        }
        else if(clickno===1)
        {
            console.log('hey1');
            $('#workstation-meme').resizable("disable");
            $('.dragger').hide();
            clickno=0;

        }
    }

    //console.log('hey');
    document.getElementById('workstation-meme').addEventListener('click',showbutton);

    
    $('#workstation').height($('#workstation-meme').height());

    var fromleft = ($('#workstation-meme').width())/2;

    $('#dragger').css({
        left:fromleft,
    });

    var fromtop = ($('#workstation-meme').height())/2;

    adjustButtons(fromtop,fromleft);

    document.getElementById('half-width-1').addEventListener('click',function(){
        if(half_width_pressed===0){
            $('#workstation-meme').width(width_i/2);
            half_width_pressed=1;
            fromtop = ($('#workstation-meme').height())/2;
            fromleft=($('#workstation-meme').width())/2;
            adjustButtons(fromtop,fromleft);
        }
        else{
            $('#workstation-meme').width(width_i);
            half_width_pressed=0;
            fromtop = ($('#workstation-meme').height())/2;
            fromleft=($('#workstation-meme').width())/2;
            adjustButtons(fromtop,fromleft);
        }
    });

    function adjustButtons(fromtop,fromleft){
        $('#half-width-1,#half-width-2').css({
            top:fromtop,
        });

        $('#dragger').css({
            left:fromleft,
            top:fromtop*2-9,
        });

        $('#half-width-2').css({
            left:fromleft*2-9,
        });
    }
    }
   
    if(title=="Dedicated meme page")
    {

        $('.display-edit').click(function(){
            $(this).parent().next().toggle();
        });
        $('.right-container').height($('.dedicated-meme').height());
        $('.submit-comment').height($('.comment-input').height());

        $('.comment-input').focusin(function(){

            $('.submit-comment').show();

        });

        $('.postcomment').click(function(){
            $(this).hide();
            $('.comment-input').css('height','44');
            $('.submission').css('height','75');
            $('.comment-input').css({
                        'border':'none',
                        'border-bottom':'solid 1px black',
                    });
        });
        $('body').on('click',function(event){

                if(event.target.className!='submit-comment'){
                    $('.submit-comment').hide();
                    $('.comment-input').css({
                        'border':'none',
                        'border-bottom':'solid 1px black',
                    });
                }
        });
        
        $('.comment-input').focusin(function(){
            $(this).css({'border-bottom':'solid 2px #b522a8'});
        });
        var height_c=$('.comment-input').height();
        var height_s=$('.submission').height();
        var i=1;

        

        $('.comment-input').keyup(
            function(){
            /*console.log('tfy');*/
            this.style.height = "1px";
            this.style.height = (this.scrollHeight+3)+"px";
            console.log(this.scrollHeight);
            
            $('.submission').height(this.style.height);
            

        });

        $('.text-reply').keyup(
            function(){
            /*console.log('tfy');*/
            this.style.height = "1px";
            this.style.height = (this.scrollHeight+3)+"px";
            console.log(this.scrollHeight);
            
            $('.replyform').height(this.style.height);
            

        });


        /*$('.comment-input').on('keypress',function(e){
            if(e.which==13){
                $('.comment-input').height(height_c+32);
                
                $('.submission').height(height_s+32);
                height_c=$('.comment-input').height();
                height_s=$('.submission').height();
                
            }
        });

        function output(str) {
            for(var i=0;i<str.length;i++){
                if(str.charAt(i)==='\n'){
                    $('.comment-input').height(height_c-32);
                    $('.submission').height(height_s-32);
                    height_c=$('.comment-input').height();
                    height_s=$('.submission').height();
                }
            }
        }

        

        $.fn.getCursorPosition = function() {
            var el = $(this).get(0);
            var pos = 0;
            var posEnd = 0;
            if('selectionStart' in el) {
                pos = el.selectionStart;
                posEnd = el.selectionEnd;
            } else if('selection' in document) {
                el.focus();
                var Sel = document.selection.createRange();
                var SelLength = document.selection.createRange().text.length;
                Sel.moveStart('character', -el.value.length);
                pos = Sel.text.length - SelLength;
                posEnd = Sel.text.length;
            }
            return [pos, posEnd];
        };

        $('#comment').keydown(function (e) {
            var position = $(this).getCursorPosition();
            var deleted = '';
            var val = $(this).val();
            if (e.which == 8) {
                if (position[0] == position[1]) {
                    if (position[0] == 0)
                        deleted = '';
                    else
                        deleted = val.substr(position[0] - 1, 1);
                }
                else {
                    deleted = val.substring(position[0], position[1]);
                }
            }
            else if (e.which == 46) {
                var val = $(this).val();
                if (position[0] == position[1]) {
                    
                    if (position[0] === val.length)
                        deleted = '';
                    else
                        deleted = val.substr(position[0], 1);
                }
                else {
                    deleted = val.substring(position[0], position[1]);
                }
            }
            output(deleted);
        });*/

        /*$('.text-reply').keydown(function (e) {
            var position = $(this).getCursorPosition();
            var deleted = '';
            var val = $(this).val();
            if (e.which == 8) {
                if (position[0] == position[1]) {
                    if (position[0] == 0)
                        deleted = '';
                    else
                        deleted = val.substr(position[0] - 1, 1);
                }
                else {
                    deleted = val.substring(position[0], position[1]);
                }
            }
            else if (e.which == 46) {
                var val = $(this).val();
                if (position[0] == position[1]) {
                    
                    if (position[0] === val.length)
                        deleted = '';
                    else
                        deleted = val.substr(position[0], 1);
                }
                else {
                    deleted = val.substring(position[0], position[1]);
                }
            }
            output1(deleted);
        });*/

        //var height_c1=$('.text-reply').height();
        /*var height_s1=$('.replyform').height();
        $('.text-reply').on('keypress',function(e){
            if(e.which==13){
                //$('.text-reply').height(height_c1+32);

                $('.text-reply').height($('.replyform').height()+5);
                $('.replyform').height(height_s1+22);
                //height_c1=$('.text-reply').height();
                height_s1=$('.replyform').height();
            }
        });
        function output1(str) {
            for(var i=0;i<str.length;i++){
                if(str.charAt(i)==='\n'){
                    $('.replyform').height(height_s1-22);
                    $('.text-reply').height($('.replyform').height()-22);
                    height_s1=$('.replyform').height();
                }
            }
        }*/

    }


    /*if(title=="Settings"){
        console.log($('#userStatus').width());
        
        $('#update-pic').addClass('current-link');
        $('#update-pic').click(function(){
            $('.change-password').hide();
            $('.update-status').hide();
            $('.prof-pic-update').show();
            $(this).addClass('current-link');
            $('#update-stat').removeClass('current-link');
            $('#change-pass').removeClass('current-link');
        });
        $('#change-pass').click(function(){
            $('.change-password').show();
            $('.update-status').hide();
            $('.prof-pic-update').hide();
            $(this).addClass('current-link');
            $('#update-stat').removeClass('current-link');
            $('#update-pic').removeClass('current-link');
        });
        $('#update-stat').click(function(){

            $('.change-password').hide();
            $('.update-status').show();
            $('.prof-pic-update').hide();
            $(this).addClass('current-link');
            $('.edit-status').css({
                left:$('#userStatus').width()+98,
            });
            $('#update-pic').removeClass('current-link');
            $('#change-pass').removeClass('current-link');
        });
        var piccanvas=(document).getElementById('prof-pic');
        var context=piccanvas.getContext('2d');
        var canvas=(document).getElementById('prof-pic-canvas');
        var ctx=canvas.getContext('2d');
        var img= new Image();
        console.log(img);
        img.src="Elon.jpg";
        $(img).on('load',function(){
            var aspect_ratio=this.height/this.width;
            this.width=400;
            piccanvas.width=400;
            this.height=400*aspect_ratio;
            piccanvas.height=this.height;
            context.drawImage(this,0,0,400,piccanvas.height);
            canvas.width=260;
            canvas.height=260;
            ctx.beginPath();
            ctx.arc(130,130,130,0,2*Math.PI);
            ctx.fillStyle='rgba(255,0,0,0)';
            ctx.fill();

            ctx.stroke();
            $(canvas).css({
                left: 60,
                top: 60,
            });
            $(canvas).draggable();
            ctx.fillStyle='rgba(255,0,0,0)';
            ctx.fill();
            $(canvas).mouseover(function(e){
                $(this).css('cursor','move');

                /*$(this).add(canvas).click(function(ev){
                    console.log(ev.pageX);
                    $(canvas).css({
                        left:ev.pageX-730,
                        top:ev.pageY-220,
                    });
                });(comment close here)
            });
        });
    
        
    }*/
    
    if(title=="Settings"){
        console.log($('#userStatus').width());
        
        $('#update-pic').addClass('current-link');
        $('#update-pic').click(function(){
            $('.change-password').hide();
            $('.update-status').hide();
            $('.prof-pic-update').show();
            $('.language-select-div').hide();
            $(this).addClass('current-link');
            $('#update-stat').removeClass('current-link');
            $('#change-pass').removeClass('current-link');
            $('#select-lang').removeClass('current-link');
        });
        $('#change-pass').click(function(){
            $('.change-password').show();
            $('.update-status').hide();
            $('.prof-pic-update').hide();
            $('.language-select-div').hide();
            $(this).addClass('current-link');
            $('#update-stat').removeClass('current-link');
            $('#update-pic').removeClass('current-link');
            $('#select-lang').removeClass('current-link');
        });
        $('#update-stat').click(function(){

            $('.change-password').hide();
            $('.update-status').show();
            $('.prof-pic-update').hide();
            $('.language-select-div').hide();
            $(this).addClass('current-link');
            $('.edit-status').css({
                left:$('#userStatus').width()+98,
            });
            $('#update-pic').removeClass('current-link');
            $('#change-pass').removeClass('current-link');
            
            $('#select-lang').removeClass('current-link');
        });
        $('#select-lang').click(function(){

            $('.change-password').hide();
            $('.update-status').hide();
            $('.prof-pic-update').hide();
            $('.language-select-div').show();
            $(this).addClass('current-link');
            $('#update-pic').removeClass('current-link');
            $('#change-pass').removeClass('current-link');
            $('#update-stat').removeClass('current-link');
        });
        

                /*$(this).add(canvas).click(function(ev){
                    console.log(ev.pageX);
                    $(canvas).css({
                        left:ev.pageX-730,
                        top:ev.pageY-220,
                    });
                });
            });
        });*/
    }
    


    /*$('#freshmemes').click(function(){
        $('#recommendedmemes').removeClass('borderi');
        $('.recommendedmemes').hide();
        $('.trendingmemes').hide();
        $('.freshmemes').show();
        $(this).addClass('border');
        $('#recommendedmemes').removeClass('border');
        $('#trendingmemes').removeClass('border');
    });
    /*function searchboxanimation(){
        var elem=document.getElementById('search-box')
        var pos=0;
        elem.style.top=20px;
    };*/

    /*if(title=="Group Page"){
        $(window).scroll(function(){
        var scrollYpos = $(document).scrollTop();
        if (scrollYpos > 30) {
            console.log('hey');
            $('.group-invitation').children('.invitation-prompt').html("");
            $('.group-invitation').css({
                width:110,
                left:315,
            });
            $('.group-accept,.group-reject').css({
                width:45,
                left:-3,
            });
        }
        if(scrollYpos<30){
            $('.group-invitation').children('.invitation-prompt').html("You have an invite request pending from this group.");
            $('.group-invitation').css({
                width:665,
                left:380,
            });
            $('.group-accept,.group-reject').css({
                width:70,
                left:10,
            });
        }
        });
        var img_height=$('.big-img').height();
        var img_width=$('.big-img').width();
        var aspect_ratio=(double)img_width/img_height;
        
    }*/

    

});