// Gallery
document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll(".btn-filter");
    const galleryItems = document.querySelectorAll(".gallery-item");

    filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            const filter = button.getAttribute("data-filter");

            galleryItems.forEach((item) => {
                if (filter === "all" || item.classList.contains(filter)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});

// Order Form Packages
document.addEventListener("DOMContentLoaded", function () {
    const numberOfFriendsInput = document.getElementById("number_of_friends");
    const totalPaymentInput = document.querySelector(
        "input[name='total_payment']"
    );
    const basePrice = 60000;
    const additionalCostPerPerson = 15000;
    const adminFee = 2000;

    numberOfFriendsInput.addEventListener("input", function () {
        const numberOfFriends = parseInt(numberOfFriendsInput.value) || 0;
        let additionalCost = 0;

        if (numberOfFriends > 4) {
            additionalCost = (numberOfFriends - 4) * additionalCostPerPerson;
        }

        const totalPayment = basePrice + additionalCost + adminFee;
        totalPaymentInput.value = totalPayment;

        document.getElementById(
            "display-total"
        ).textContent = `Rp${totalPayment.toLocaleString("id-ID")}`;
    });
});
