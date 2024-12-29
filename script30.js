// List of countries (Example array with more than 50 countries)
const countries = [
  "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina",
  "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
  "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana",
  "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon",
  "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo",
  "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
  "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea",
  "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia"
];

// Select the table body
const tableBody = document.querySelector("#countriesTable tbody");

// Number of countries to display
const numberOfCountries = 50;
const countriesPerRow = 6;

// Loop through the first 50 countries and create rows
for (let i = 0; i < Math.min(numberOfCountries, countries.length); i += countriesPerRow) {
  // Create a new table row
  const row = document.createElement("tr");

  // Loop through the current set of countries for the row
  for (let j = 0; j < countriesPerRow; j++) {
    const index = i + j;
    const cell = document.createElement("td");
    if (index < countries.length) {
      cell.textContent = countries[index];
    } else {
      cell.textContent = ""; // Fill with empty cells if no more countries
    }
    row.appendChild(cell);
  }

  // Append the row to the table body
  tableBody.appendChild(row);
}
