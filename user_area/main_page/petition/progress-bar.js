window.onload = function() {
    var totalSupporters = document.querySelector('#total_supporters').innerHTML;
    var targetedSupporters = document.querySelector('#targeted_supporters').innerHTML;
    var barPercentage = totalSupporters / targetedSupporters * 100;
    console.log(barPercentage);
    startProgress(barPercentage);
  };
  
  function startProgress(barPercentage) {
    let progressBar = document.getElementById('myProgressBar');
    let width = 0;
  
    // Increase the width of the progress bar every 50 milliseconds
    let interval = setInterval(function () {
      if (width >= barPercentage) {
        clearInterval(interval); // Stop the progress when it reaches 70%
      } else {
        width++;
        progressBar.style.width = width + '%';
      }
    }, 2);
}