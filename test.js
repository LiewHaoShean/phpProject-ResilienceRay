function startProgress(targetPercentage) {
    let progressBar = document.getElementById('myProgressBar');
    let currentPercentage = 0;
  
    // Calculate the difference between current and target percentages
    let percentageDiff = targetPercentage - currentPercentage;
  
    // Calculate the width increment for each step
    let widthIncrement = percentageDiff / 100;
  
    // Increase the width of the progress bar every 50 milliseconds
    let interval = setInterval(function () {
      if (currentPercentage >= targetPercentage) {
        clearInterval(interval); // Stop the progress when it reaches the target percentage
      } else {
        currentPercentage += widthIncrement;
        progressBar.style.width = currentPercentage + '%';
      }
    }, 50);
  }

function yayy() {
  console.log("yayy")
}