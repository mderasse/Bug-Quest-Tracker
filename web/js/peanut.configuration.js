$(document).ready(function(){
    
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