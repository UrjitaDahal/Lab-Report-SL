// Select elements
const yearElement = document.querySelector('h1');
const dateTimeElement = document.querySelector('h2');
const challenges = document.querySelectorAll('li');

// Function to change the year color every second
setInterval(() => {
  const randomColor = `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`;
  yearElement.style.color = randomColor;
}, 1000);

// Function to change the background color of the date and time every second
setInterval(() => {
  const randomColor = `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`;
  dateTimeElement.style.backgroundColor = randomColor;
}, 1000);

// Set background colors for the challenges
challenges.forEach((challenge) => {
  const text = challenge.textContent.toLowerCase();
  if (text.includes('done')) {
    challenge.style.backgroundColor = 'green';
  } else if (text.includes('ongoing')) {
    challenge.style.backgroundColor = 'yellow';
  } else if (text.includes('coming')) {
    challenge.style.backgroundColor = 'red';
  }
});
