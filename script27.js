// a. Get the first paragraph using document.querySelector(tagname)
const firstParagraph = document.querySelector('p');
console.log('First Paragraph:', firstParagraph.textContent);

// b. Get each paragraph using document.querySelector('#id') by their id
const para1 = document.querySelector('#para1');
const para2 = document.querySelector('#para2');
const para3 = document.querySelector('#para3');
const para4 = document.querySelector('#para4');

console.log('Paragraph 1:', para1.textContent);
console.log('Paragraph 2:', para2.textContent);
console.log('Paragraph 3:', para3.textContent);
console.log('Paragraph 4:', para4.textContent);

// c. Get all paragraphs as a NodeList using document.querySelectorAll(tagname)
const allParagraphs = document.querySelectorAll('p');
console.log('All Paragraphs:', allParagraphs);

// d. Loop through the NodeList and get the text content of each paragraph
allParagraphs.forEach((p, index) => {
  console.log(`Paragraph ${index + 1}:`, p.textContent);
});

// e. Set a text content to the fourth paragraph, "Fourth Paragraph"
para4.textContent = 'Fourth Paragraph';

// f. Set id and class attributes for all paragraphs using different methods
allParagraphs.forEach((p, index) => {
  p.id = `newId${index + 1}`; // Set new IDs
  p.className = `newClass${index + 1}`; // Set new class names
});

// g. Change style of each paragraph (color, background, border, font-size, font-family)
allParagraphs.forEach((p) => {
  p.style.color = 'blue';
  p.style.backgroundColor = 'lightgray';
  p.style.border = '1px solid black';
  p.style.fontSize = '16px';
  p.style.fontFamily = 'Arial, sans-serif';
});

// h. Loop through paragraphs and set colors: green for 1st and 3rd, red for 2nd and 4th
allParagraphs.forEach((p, index) => {
  if (index === 0 || index === 2) {
    p.style.color = 'green'; // 1st and 3rd paragraph
  } else if (index === 1 || index === 3) {
    p.style.color = 'red'; // 2nd and 4th paragraph
  }
});

// i. Set text content, id, and class for each paragraph
allParagraphs.forEach((p, index) => {
  p.textContent = `Updated text for Paragraph ${index + 1}`;
  p.id = `updatedId${index + 1}`;
  p.className = `updatedClass${index + 1}`;
});
