window.onload = function() {
    startProgress();
  };
  
  function startProgress() {
    let progressBar = document.getElementById('myProgressBar');
    let width = 0;
  
    // Increase the width of the progress bar every 50 milliseconds
    let interval = setInterval(function () {
      if (width >= 70) {
        clearInterval(interval); // Stop the progress when it reaches 70%
      } else {
        width++;
        progressBar.style.width = width + '%';
      }
    }, 50);
}