function openForm() {
  document.getElementById("loginForm").style.display = "block";
  }
  
function closeForm() {
  document.getElementById("loginForm").style.display = "none";
}


//Funcao pora alterar light/dark
//function changeCSS(light, cssLinkIndex) {

 // var dark = document.getElementsByTagName("link").item(cssLinkIndex);

  //var light = document.createElement("link");
  //light.setAttribute("rel", "stylesheet");
  //light.setAttribute("type", "text/css");
  //light.setAttribute("href", "light");

  //document.getElementsByTagName("head").item(0).replaceChild(light, dark);
//}






// Cria uma nova lista quando é clicado o botão adicionar
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("Tem de escrever algo!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
