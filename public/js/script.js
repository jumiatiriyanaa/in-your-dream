// Auth
const images = document.querySelectorAll(".background-image");
let currentIndex = 0;

function showNextImage() {
    images[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add("active");
}

setInterval(showNextImage, 2000);

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

// Order Form Selfphoto / Photobox Packages
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

// Order Form Other Packages
document.getElementById("package_type").addEventListener("change", function () {
    var packageType = this.value;
    var eventContainer = document.getElementById("event_other_container");

    if (packageType === "Event Lainnya") {
        eventContainer.style.display = "block";
        document.getElementById("other_event_name").required = true;
    } else {
        eventContainer.style.display = "none";
        document.getElementById("other_event_name").required = false;
    }
});

// Weeddin Form
document.addEventListener("DOMContentLoaded", function () {
    const sameAsAddressCheckbox = document.getElementById("same_as_address");
    const eventLocation = document.getElementById("event_location");

    if (sameAsAddressCheckbox) {
        sameAsAddressCheckbox.addEventListener("change", function () {
            const userAddress = this.getAttribute("data-address");
            if (this.checked) {
                eventLocation.value = userAddress;
                eventLocation.disabled = true;
            } else {
                eventLocation.value = "";
                eventLocation.disabled = false;
            }
        });
    }
});

function copyAccountNumber() {
    const accountNumber = document.getElementById("account-number").innerText;
    navigator.clipboard
        .writeText(accountNumber)
        .then(() => {
            alert("Nomor rekening berhasil disalin!");
        })
        .catch((err) => {
            console.error("Gagal menyalin nomor rekening: ", err);
        });
}

// Rating
document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll(".star-input");
    const labels = document.querySelectorAll(".star-label");

    function updateStarsOnHover(index) {
        labels.forEach((label, idx) => {
            if (idx <= index) {
                label.style.color = "#ffc107";
            } else {
                label.style.color = "#ccc";
            }
        });
    }

    function updateStarsOnClick(index) {
        labels.forEach((label, idx) => {
            if (idx <= index) {
                label.style.color = "#ffc107";
            } else {
                label.style.color = "#ccc";
            }
        });
    }

    labels.forEach((label, index) => {
        label.addEventListener("mouseover", () => {
            updateStarsOnHover(index);
        });

        label.addEventListener("mouseleave", () => {
            const selectedStar = document.querySelector(".star-input:checked");
            const selectedIndex = selectedStar
                ? Array.from(stars).indexOf(selectedStar)
                : -1;
            updateStarsOnClick(selectedIndex);
        });
    });

    stars.forEach((star, index) => {
        star.addEventListener("change", () => {
            updateStarsOnClick(index);
        });
    });
});
