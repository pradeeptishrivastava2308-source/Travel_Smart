const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
const tripForm = document.getElementById("tripForm");
const planResult = document.getElementById("planResult");
const filterButtons = document.getElementById("filterButtons");
const destinationCards = document.querySelectorAll(".destination-card");
const yearElement = document.getElementById("year");

if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", () => {
        navLinks.classList.toggle("show");
    });
}

if (tripForm && planResult) {
    tripForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const fromCity = document.getElementById("fromCity").value.trim();
        const toCity = document.getElementById("toCity").value.trim();
        const travelDate = document.getElementById("travelDate").value;
        const budget = document.getElementById("budget").value;
        const tripDays = document.getElementById("tripDays").value;
        const travelers = document.getElementById("travelers").value;

        const dateText = travelDate ? new Date(travelDate).toDateString() : "your selected date";

        planResult.classList.remove("hidden");
        planResult.innerHTML = `
            <h3>Your quick travel brief</h3>
            <ul>
                <li><strong>Route:</strong> ${fromCity} → ${toCity}</li>
                <li><strong>Travel date:</strong> ${dateText}</li>
                <li><strong>Trip length:</strong> ${tripDays} day(s) for ${travelers} traveler(s)</li>
                <li><strong>Budget:</strong> ₹${Number(budget).toLocaleString("en-IN")}</li>
                <li><strong>AI prompt:</strong> Plan a ${tripDays}-day trip from ${fromCity} to ${toCity} under ₹${budget}, include train options and recommended hotels.</li>
            </ul>
        `;
    });
}

if (filterButtons) {
    filterButtons.addEventListener("click", (event) => {
        const target = event.target;
        if (!(target instanceof HTMLButtonElement)) {
            return;
        }

        const filter = target.dataset.filter;
        if (!filter) {
            return;
        }

        filterButtons.querySelectorAll("button").forEach((button) => {
            button.classList.remove("active");
        });
        target.classList.add("active");

        destinationCards.forEach((card) => {
            const type = card.getAttribute("data-type");
            card.style.display = filter === "all" || type === filter ? "block" : "none";
        });
    });
}

if (yearElement) {
    yearElement.textContent = new Date().getFullYear().toString();
}

