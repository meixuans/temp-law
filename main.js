function company_filter(str) {
	if (str.length != 0) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('output2').innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "filter_company.php?q="+str, true);
		xmlhttp.send();
	}
}

function sort_date_func() {
	var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("sorted_doc").innerHTML =
	      this.responseText;
	    }
	  };
	xhttp.open("GET", "sort_date_document.php", true);
	xhttp.send();
}

function see_all_files() {
	var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("output00").innerHTML =
	      this.responseText;
	    }
	  };
	xhttp.open("GET", "file_handler.php", true);
	xhttp.send();
}
