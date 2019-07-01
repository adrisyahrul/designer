function JumpToIt(list)
{
    var selection = list.options[list.selectedIndex].value
    if (selection != "None")
        location.href = selection
}

$("#repeat-pass").keyup(function() {
		if($("#repeat-pass").val() == $("#password").val()) {
			$(".fa-circle").addClass("green")
			$(".fa-circle").removeClass("red")
			$(".match").css("display", "block")
			$(".nmatch").css("display", "none")
			$(".validation-pass").css("display", "block")
			}
		else {
			$(".fa-circle").addClass("red")
			$(".fa-circle").removeClass("green")
			$(".nmatch").css("display", "block")
			$(".match").css("display", "none")
			$(".validation-pass").css("display", "block")
		}
			
		});
$(".jv-search").click(function() {
    if ($(".jv-search").val() == 0) {
        $(".jv-search").val(1);
        $(".search-box").addClass('active-search'); 
    }
    else if ($(".jv-search").val() == 1) {
        $(".jv-search").val(0);
        $(".search-box").removeClass('active-search'); 
    }
});
