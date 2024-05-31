function disableInputBox(const inpBox) {
  // Set the date you want to disable the input box after
  const disableDate = new Date(); // Change to your desired date

  // Get today's date
  const today = new Date();

  // Compare today's date to the disable date
  if (today > disableDate) {
    // Disable the input box
    input.disabled = true;
  }
}




disableInputBox(document.getElementById('monNum'));
disableInputBox(document.getElementById('tuesNum'));
disableInputBox(document.getElementById('wedNum'));
disableInputBox(document.getElementById('thursNum'));
disableInputBox(document.getElementById('friNum'));