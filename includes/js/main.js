$(document).ready(function(){
    tinymce.init({selector:"#blog_contents_textarea"});
    $(".tinymce_me").each(function(){
        console.log("hitting ",'#'+$(this).attr('id'));
        tinymce.init({selector:"#blog_contents_textarea"});
    });
});

function create_edit_post(button_source){
    console.log('target is ',button_source);
    var form = $("#create_blog_post_form");
    var formdata = new FormData(form[0]);
    formdata.append('content',tinyMCE.activeEditor.getContent());

    $.ajax({
        url:"includes/methods/create.php",
        cache: false,
        data: formdata,
        type: 'post',
        datatype: 'text',
        processData: false,
        contentType: false,
        success: function(response){
            console.log("file send succeed");
        }
    });
}
function login_user(source){
    var parent_form = $(source).parents('form');
    var formdata = new FormData(parent_form[0]);
    $.ajax({
        url:"includes/methods/login.php",
        cache: false,
        data: formdata,
        type: 'post',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response){
            console.log('test',response);
            if(response.success){
                alert(response.message);
                $("#user_info > .avatar").attr('src',response.avatar);
                $("#user_info > .greeting").html(response.greeting);
                $(".logout_link").show();
                $(".login_link").hide();
                $(".login_dialog").hide();
            }
            else{
                alert(response.message);
            }
        }
    }).always(function(){ console.log("uhhmmmm");}).fail(function(){ console.log("uhhmmmm fail");});
}