let numer = Math.floor(Math.random() * 15) + 1;

let timer1 = 0;
let timer2 = 0;

function ustawslajd(nrslajdu) {
	clearTimeout(timer1);
	clearTimeout(timer2);
	numer = nrslajdu - 1;
	$("#slider").fadeOut(500);
	for (i = 1; i <= 15; i++) {
		$("#slajd" + i).css("font-weight", "normal");
	}
	setTimeout("zmienslajd()", 500);

}

function zmienslajd() {
	numer++;
	if (numer > 15) {
		numer = 1;
		$("#slajd15").css("font-weight", "normal");
	}
	$("#slajd" + (numer - 1)).css("font-weight", "normal");

	let plik = "<img id =\"slider-img\" src=\"../jpg/" + numer + ".jpg\" />";
	$("#slajd" + numer).css("font-weight", "bold");
	document.getElementById("slider").innerHTML = plik;
	$("#slider").fadeIn(500);

	timer1 = setTimeout("zmienslajd()", 5000);
	timer2 = setTimeout("$(\"#slider\").fadeOut(500);", 4500);
}
