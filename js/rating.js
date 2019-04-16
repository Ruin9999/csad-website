var slider = document.getElementById("rating");
var output = document.getElementById("ratingvalue");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
};