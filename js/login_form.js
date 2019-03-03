$(document).ready(function() {
   $(".register-form").hide();
   $("#btn_login").click(function(){
      $(".register-form").hide();
      $(".login-form").show();
   });

   $(".message-sign-in a").click(function(){
      $(".register-form").hide("slow");
      $(".login-form").show("slow");
      $(".login-form > input[name='username']").focus();
      $("title").html("Uhuy Rental | Login");
   });

   $(".message-register a").click(function(){
      $(".login-form").hide("slow");
      $(".register-form").show("slow");
      $(".register-form > input[name='nama_depan']").focus();
      $("title").html("Uhuy Rental | Sign Up");
   });

   $('#modal_login').on('shown.bs.modal', function () {
      $("title").html("Uhuy Rental | Login");
      $(".login-form > input[name='username']").focus();
   })  

   $("#modal_login").on("hidden.bs.modal", function () {
      $("title").html("Uhuy Rental");
      $(".form input[type='text']").val("");
      $(".form input[type='password']").val("");
      $(".form input[type='email']").val("");
   });
});