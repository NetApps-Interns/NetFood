var i = 0;
var txt = "Enter your delivery address...";
var speed = 50;

function typeWriter() {
	if (i < txt.length) {
		document.getElementById("input").innerHTML += txt.charAt(i);
		i++;
		setTimeout(typeWriter, speed);
	}
}

// Mobile View Link icon display
$(".js--nav-icon").click(function () {
	var nav = $(".main-nav");
	var icon = $(".js--nav-icon");

	nav.slideToggle(400);

	// if (icon.hasClass)
});
