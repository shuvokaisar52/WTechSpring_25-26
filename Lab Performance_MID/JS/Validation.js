const unitprice = document.getElementById('unitPrice').value;
const quantityDay = document.getElementById('quantityDay');
const totalPrice = document.getElementById('totalPrice');
const errorMsg = document.getElementById('error');
const days = 30;

function calculate() {
    let quantity = parseInt(quantityDay.value) || 0;

    if (quantity < 0) {
        if (quantityDay.value !== "") {
            errorMsg.style.display = "block";
            quantity = 0;
        } else {
            errorMsg.style.display = "none";
            quantity = 0;
        }
    }

    const total = unitprice * quantity * days;
    totalPrice.value = total;

    if (total > 1000) {
        alert("Thank you! You are eligible for a gift coupon.");
    }
}

quantityDay.addEventListener('change', calculate);
