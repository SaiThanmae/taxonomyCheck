<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
  background-color:yellow;
}
th,td {
  padding: 5px;
}
p{
  color:red;
  font-size:40px;
}
</style>
<body>
<center>
<h1>Verbs to use for course outcomes</h1>

<label for="selection" value="Enter word">
<input type="text" id="selection">
<br>
<br>
<button type="button" onclick="loadDoc()">Get taxonomy</button>
<br><br>
<p id="demo"></p>
</center>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xhttp.open("GET", "data.xml", true);
  xhttp.send();
}
function myFunction(xml) {
  var i;
  var res="Not a valid word";
  var p =document.getElementById("selection").value;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>"+p+"</th></tr>";
 
  var x = xmlDoc.getElementsByTagName("word");
  for (i = 0; i <x.length; i++) { 
    if(x[i].childNodes[0].nodeValue == p){
      res=x[i].parentNode.nodeName;
    }
    
  }
  document.getElementById("demo").innerHTML = res;
}
</script>

</body>
</html>
