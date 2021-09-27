var result, var1, var2, sign
var result = 69
var memory = [0,0,0,0,0,0,0,0,0,0]

	function takeNumber(x) {

	document.getElementById("viewer").innerHTML += x;	
	
	}
	
	function ResNum() {

	document.getElementById("viewer").innerHTML = " ";	
	
	}
	
	function equalsNum() {
	
	var2 = Number(document.getElementById("viewer").innerHTML);
				switch (sign) {
			  case 0:
				result = (var1-var2);
				break;
			  case 1:
				result = (var1+var2);
				break;
			  case 2:
				 result = (var1*var2);
				 break;
			  case 3:
				if (var2 == 0) {
					alert('Nie jesteś kaskaderem-hardkorem, czyli nie dzielisz przez 0. elo nie pozdrawiam');
					result = ' ';
					break;
				} else {result = (var1/var2);
				 break; }
			  case 4:
				result = Math.pow(var1, var2);
				break;
			  case 5:
				result = Math.sqrt(var1);	
				break;
			  case 6:
				result = Math.sin(var1);
				break;
			  case 7:
				result = Math.cos(var1);
				break;
			  case 8:
				result = Math.tan(var1);
				break;
			  case 9: 
				result = 1 / Math.tan(var1);
				break;
			  case 10:
				result = (var1%var2);
				break;
			}
		document.getElementById("viewer").innerHTML = result;
	
	}
	function numMath(x) {
	
	var1 = Number(document.getElementById("viewer").innerHTML);
	document.getElementById("viewer").innerHTML = " ";
	
	sign = x;
	
	}
	
	
	function saveMemory(x) {
	
	if (memory[x] == 0) {
	memory[x] = Number(document.getElementById("viewer").innerHTML);
	} else {
	document.getElementById("viewer").innerHTML = memory[x];
	}
	}
	
	function funcEval() {
	try {
	var expression = (document.getElementById("numb").value);
     //document.getElementById("viewer").innerHTML = expression;
	document.getElementById("viewer").innerHTML = eval(expression);
	 }
  catch(err) {
    alert("Error: " + err + ".");
  }
  }
  
  	function funcInform() {
	
		alert("Evaluacja jest funkcją eksperymentalną! Używasz na własne ryzyko!");
	
  }