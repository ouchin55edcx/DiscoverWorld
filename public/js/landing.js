document.getElementById('hamburgerBtn').addEventListener('click', function() {
    document.getElementById('mobileNav').classList.toggle('hidden');
});

document.getElementById('closeMobileNav').addEventListener('click', function() {
    document.getElementById('mobileNav').classList.add('hidden');
});