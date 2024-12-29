// Function to check if a number is prime
function isPrime(num) {
  if (num < 2) return false;
  for (let i = 2; i <= Math.sqrt(num); i++) {
    if (num % i === 0) return false;
  }
  return true;
}

// Select the container div
const container = document.querySelector('.container');

// Generate numbers from 0 to 100 and append to the container
for (let i = 0; i <= 100; i++) {
  const numberDiv = document.createElement('div');
  numberDiv.classList.add('number');
  numberDiv.textContent = i;

  // Set background color based on the number's properties
  if (isPrime(i)) {
    numberDiv.style.backgroundColor = 'red'; // Prime numbers
  } else if (i % 2 === 0) {
    numberDiv.style.backgroundColor = 'green'; // Even numbers
  } else {
    numberDiv.style.backgroundColor = 'yellow'; // Odd numbers
  }

  // Append the number div to the container
  container.appendChild(numberDiv);
}
