const setValue = (str, t) => {
	const xmlhttp = new XMLHttpRequest();
	// xmlhttp.onload = function () {
	// 	document.getElementById("info").innerHTML = this.responseText;
	// };
	xmlhttp.open(
		"POST",
		"./controller/infoController.php?q=" + str + "&type=" + t
	);
	xmlhttp.send();
};
