/* Tämän avulla sivuston ylänapit ovat mobiiliresponsiiviset eli mobiililaitteella napit muuttuvat hienommaksi valikoksi  
jolla on helpompi navigoida puhelimella */
function myFunction() {
  var x = document.getElementById("topnav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}