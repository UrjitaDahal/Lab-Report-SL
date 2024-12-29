// Add a cookie
function addCookie() {
    const key = document.getElementById("key").value;
    const value = document.getElementById("value").value;

    if (key && value) {
        document.cookie = `${key}=${value}; path=/;`;
        alert("Cookie added successfully!");
    } else {
        alert("Please enter both key and value.");
    }
}

// Read a cookie by key
function readCookie() {
    const key = document.getElementById("readKey").value;
    const cookies = document.cookie.split("; ");

    for (let i = 0; i < cookies.length; i++) {
        const [cookieKey, cookieValue] = cookies[i].split("=");
        if (cookieKey === key) {
            document.getElementById("readResult").innerText = `Value: ${cookieValue}`;
            return;
        }
    }

    document.getElementById("readResult").innerText = "Cookie not found!";
}

// Display all cookies
function displayAllCookies() {
    const cookies = document.cookie.split("; ");
    const tableBody = document.getElementById("cookieTable").querySelector("tbody");
    tableBody.innerHTML = ""; // Clear the table

    cookies.forEach(cookie => {
        const [key, value] = cookie.split("=");
        const row = document.createElement("tr");

        const keyCell = document.createElement("td");
        keyCell.textContent = key;

        const valueCell = document.createElement("td");
        valueCell.textContent = value;

        row.appendChild(keyCell);
        row.appendChild(valueCell);
        tableBody.appendChild(row);
    });
}

// Delete a cookie by key
function deleteCookie() {
    const key = document.getElementById("deleteKey").value;
    if (key) {
        document.cookie = `${key}=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC;`;
        alert(`Cookie with key '${key}' deleted successfully.`);
    } else {
        alert("Please enter a key to delete.");
    }
}

// Delete all cookies
function deleteAllCookies() {
    const cookies = document.cookie.split("; ");

    cookies.forEach(cookie => {
        const [key] = cookie.split("=");
        document.cookie = `${key}=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC;`;
    });

    alert("All cookies have been deleted.");
}
