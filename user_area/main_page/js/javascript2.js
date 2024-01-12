function showNavbar() {
    let menu = document.querySelector('#menu-icon');
    let navbar = document.querySelector('.navbar');

    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');

};

function toggleDonationType(type) {
    const oneOffButton = document.getElementById('one-off-button');
    const monthlyButton = document.getElementById('monthly-button');

    oneOffButton.classList.add('active');
  
    if (type === 'one-off') {
      document.getElementById('donation-form-one-off').style.display = 'block';
      document.getElementById('donation-form-monthly').style.display = 'none';
      oneOffButton.classList.add('active');
      monthlyButton.classList.remove('active');
    } else if (type === 'monthly') {
      document.getElementById('donation-form-one-off').style.display = 'none';
      document.getElementById('donation-form-monthly').style.display = 'block';
      oneOffButton.classList.remove('active');
      monthlyButton.classList.add('active');
    }
}

function toggleDonationAmountL(type) {
    const fiftyButton = document.getElementById('fifty-containerL');
    const hundredButton = document.getElementById('hundred-containerL');
    const hundredFiftyButton = document.getElementById('hundredfifty-containerL');

    if (type === 'fifty') {
      fiftyButton.classList.add('active')
      hundredButton.classList.remove('active');
      hundredFiftyButton.classList.remove('active');
    } else if (type === 'hundred') {
      fiftyButton.classList.remove('active');
      hundredButton.classList.add('active');
      hundredFiftyButton.classList.remove('active');
    } else if (type === 'hundredfifty') {
      fiftyButton.classList.remove('active');
      hundredButton.classList.remove('active');
      hundredFiftyButton.classList.add('active');
    } else if (type === 'other') {
      fiftyButton.classList.remove('active');
      hundredButton.classList.remove('active');
      hundredFiftyButton.classList.remove('active');
    }
}

function toggleDonationAmountR(type) {
  const fiftyButton = document.getElementById('fifty-containerR');
  const hundredButton = document.getElementById('hundred-containerR');
  const hundredFiftyButton = document.getElementById('hundredfifty-containerR');

  if (type === 'fifty') {
    fiftyButton.classList.add('active')
    hundredButton.classList.remove('active');
    hundredFiftyButton.classList.remove('active');
  } else if (type === 'hundred') {
    fiftyButton.classList.remove('active');
    hundredButton.classList.add('active');
    hundredFiftyButton.classList.remove('active');
  } else if (type === 'hundredfifty') {
    fiftyButton.classList.remove('active');
    hundredButton.classList.remove('active');
    hundredFiftyButton.classList.add('active');
  } else if (type === 'other') {
    fiftyButton.classList.remove('active');
    hundredButton.classList.remove('active');
    hundredFiftyButton.classList.remove('active');
  }
}

function navigateDonationBtn() {
  const section = document.getElementById('donation');
  section.scrollIntoView({ behavior: 'smooth' });
}

function toggleSearchBar() {  
  document.querySelector(".search").classList.toggle('active');
  
}

function clearSearchBar() {
  document.getElementById("search").value = "";
}

function navigatePetitionBtn() {
  const section = document.getElementById('petition');
  section.scrollIntoView({ behavior: 'smooth' });
}