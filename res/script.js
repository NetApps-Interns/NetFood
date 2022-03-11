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

	nav.slideToggle(300);

	// if (icon.hasClass)
});


function openPage(pageName, elmnt) {
	// Hide all elements with class="tabcontent" by default 
	var i, tabcontent, tablinks;

	tabcontent = document.getElementsByClassName("tabcontent");

	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}	



	// Show the specific tab content
	document.getElementById(pageName).style.display = "block";

	// 
	// elmnt.classList.add("active");
	elmnt.classList.add("active");
	other.classList.remove("active");


}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
