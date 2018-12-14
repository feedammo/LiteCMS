
$("#userWarnings").hide();
$("#userSuccess").hide();
// -------------------------------------- //
function login(){
  $.ajax({
    url: "action.php?action=login",
    type: "POST",
    data: "username="+$("#username").val()+"&password="+$("#password").val(),
    success: function(response){
      if(response!=1){
       console.log(response);
       $("#userWarnings").html(response).show();
     }else if(response==1){
       console.log(response);
       window.location.assign("home.php");
     }
   }
 });
}
// -------------------------------------- //
function signup(){
  $.ajax({
    url:"action.php?action=signup",
    type:"POST",
    data: "username="+$("#username").val()+"&password="+$("#password").val()+"&cpassword="+$("#cpassword").val()+"&email="+$("#email").val(),
    success: function(response){
     if(response!=1){
      console.log(response);
      $("#userWarnings").html(response).show();
    }else if(response==1){
      console.log(response);
      $("#userWarnings").hide();
      $("#userSuccess").html("You have successfully signed up. Login!").show();
     // $("#loginorsignup").val("1"); 
      $("#signup").click();
      //window.location.assign("home.php");
    }
  }
});
}
// -------------------------------------- //
$("#signup").click(function(){
  if ($("#loginorsignup").val()==="1") {
    $(this).html("Login").removeClass("btn-success").addClass("btn-primary");
    $("#Login-signup").html("Sign Up");
    $(".signup-form").removeClass("d-none");
    $("#loginorsignup").val("0");
    $("#login").html("Sign Up").removeClass("btn-primary").addClass("btn-success");
  }else if($("#loginorsignup").val()==="0"){
    $(this).html("Sign Up").removeClass("btn-primary").addClass("btn-success");
    $("#Login-signup").html("Login");
    $(".signup-form").addClass("d-none");
    $("#loginorsignup").val("1");
    $("#login").html("login").removeClass("btn-success").addClass("btn-primary");
  }
});
// -------------------------------------- //
$("#login").click(function(){
  if($("#loginorsignup").val()==="0"){
    signup();
  }

  else if ($("#loginorsignup").val()==="1") {
    login();
  }
});
