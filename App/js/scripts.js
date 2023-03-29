// Order form submit handler
const orderForm = document.querySelector('#order form');
const orderSuccess = document.querySelector('#order-success');

orderForm.addEventListener('submit', (e) => {
  e.preventDefault();
  // You can add your own code here to submit the form data to a server using AJAX
  orderSuccess.classList.remove('hidden');
  orderForm.reset();
  setTimeout(() => {
    orderSuccess.classList.add('hidden');
  }, 3000);
});

// Mobile menu toggle
const menuToggle = document.querySelector('#menu-toggle');
const nav = document.querySelector('nav');

menuToggle.addEventListener('click', () => {
  nav.classList.toggle('show');
});
