function togglePaymentType(type) {
    const visaBtn = document.getElementById('visa-btn');
    const paypalBtn = document.getElementById('paypal-btn');
  
    if (type === 'visa') {
      document.getElementById('visa-container').style.display = 'block';
      document.getElementById('paypal-container').style.display = 'none';
      visaBtn.classList.add('active');
      paypalBtn.classList.remove('active');
    } else if (type === 'paypal') {
      document.getElementById('visa-container').style.display = 'none';
      document.getElementById('paypal-container').style.display = 'block';
      visaBtn.classList.remove('active');
      paypalBtn.classList.add('active');
    }
}