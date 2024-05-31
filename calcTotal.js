const inputs = document.querySelectorAll('input[type="number"]');
const totalOutput = document.getElementById('amtTotal');

console.log("STARTED PROGRAM");

function calculateTotal() {
  let total = 0;
  let mult = 0;

  console.log("IN FUNCTION");

  inputs.forEach(input => {
    // If input is empty, treat it as 0
    value = input.value ? parseInt(input.value) : 0;

    console.log("IN THE INPUT LOOP THING");
    console.log("id is " + input.id);

    switch(input.id) {
      case("monNum"):
        mult= parseInt((document.getElementById('monLabel')).textContent.substring(11));
	value= mult * value;
	break;
      case("tuesNum"):
        mult= parseInt((document.getElementById('tuesLabel')).textContent.substring(12));
	value= mult * value;
	break;
      case("wedNum"):
        mult= parseInt((document.getElementById('wedLabel')).textContent.substring(14));
	value= mult * value;
	break;
      case("thursNum"):
        mult= parseInt((document.getElementById('thursLabel')).textContent.substring(13));
	value= mult * value;
	break;
      case("friNum"):
        mult= parseInt((document.getElementById('friLabel')).textContent.substring(11));
	value= mult * value;
  	break;
    }

    total += value;
  });

  const dispTotal = (total).toLocaleString('en-US', {
    style: 'currency',
    currency: 'USD'
  });
  totalOutput.innerText = "Order Total: " + dispTotal;
}

// Attach event listener to each input box
inputs.forEach(input => {
  input.addEventListener('input', calculateTotal);
});