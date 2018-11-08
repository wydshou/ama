function toggleShowHide(ElementName) {
	if (document.getElementById(ElementName).style.display == "none") {
		document.getElementById(ElementName).style.display="";
	} else {
		document.getElementById(ElementName).style.display="none";
	}
}