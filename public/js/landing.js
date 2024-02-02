document.getElementById('hamburgerBtn').addEventListener('click', function () {
    document.getElementById('mobileNav').classList.toggle('hidden');
});

document.getElementById('closeMobileNav').addEventListener('click', function () {
    document.getElementById('mobileNav').classList.add('hidden');
});


document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.getElementById('pricingType');
    dropdown.addEventListener('change', function () {
        var selectedValue = dropdown.value;
        window.location.href = '/Destination/' + selectedValue;
    });
});

