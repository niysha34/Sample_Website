var currImage = document.getElementById("scrollImage");
var images= ["kebabImage.jpg","lunchBox6.jpg","lunchBox5.jpg","burgerImage.jpg","cutlet2Image.jpg","lassiImage.jpg","noodleImage.jpg","wadapavImage.jpg","onionRingImage.jpg", "rasmalai2Image.jpg","dhoklaImage.jpg"];

var i= 0;
function scrollImage() {
  //alert("Image set to " + images[i]);
  if(i >= images.length) {i= 0;}
  currImage.setAttribute("src",images[i]);
  i++;
}

setInterval(scrollImage, 3000);