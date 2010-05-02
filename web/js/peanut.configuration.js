$(document).ready(function(){
    
  //Form login/request/register
    $("#login input#signin_username").example("Username or E-Mail");
    $("#login input#signin_password").example("Password");
  
    $("#login input#sf_guard_user_first_name").example("Firstname");
    $("#login input#sf_guard_user_last_name").example("Lastname");
    $("#login input#sf_guard_user_email_address").example("Email address");
    $("#login input#sf_guard_user_username").example("Username");
    
    $('#login input#password-clear').show();
    $('#login input#sf_guard_user_password').hide();
    
    $('#login input#password-clear').focus(function() {
        $('#login input#password-clear').hide();
        $('#login input#sf_guard_user_password').show();
        $('#login input#sf_guard_user_password').focus();
    });
    $('#login input#sf_guard_user_password').blur(function() {
        if($('#login input#sf_guard_user_password').val() == '') {
            $('#login input#password-clear').show();
            $('#login input#sf_guard_user_password').hide();
        }
    });
    
    $('#login input#password-again-clear').show();
    $('#login input#sf_guard_user_password_again').hide();
    
    $('#login input#password-again-clear').focus(function() {
        $('#login input#password-again-clear').hide();
        $('#login input#sf_guard_user_password_again').show();
        $('#login input#sf_guard_user_password_again').focus();
    });
    $('#login input#sf_guard_user_password_again').blur(function() {
        if($('#login input#sf_guard_user_password_again').val() == '') {
            $('#login input#password-again-clear').show();
            $('#login input#sf_guard_user_password_again').hide();
        }
    });
    
    $('#login input#password-clear').show();
    $('#login input#signin_password').hide();
    
    $('#login input#password-clear').focus(function() {
        $('#login input#password-clear').hide();
        $('#login input#signin_password').show();
        $('#login input#signin_password').focus();
    });
    $('#login input#signin_password').blur(function() {
        if($('#login input#signin_password').val() == '') {
            $('#login input#password-clear').show();
            $('#login input#signin_password').hide();
        }
    });
  
	//Sidebar Accordion Menu:
		
		$("#sidebar li ul").hide(); //Hide all sub menus
		$("#sidebar li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#sidebar li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).parent().siblings().find("a").css("color", "#959494");
				
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				$(this).css("color", "#1d1d1d");
				return false;
			}
		);
		
		$("#sidebar li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		);

});