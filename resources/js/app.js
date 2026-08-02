//// public/js/script.js
document.addEventListener('DOMContentLoaded', function () {
    console.log("Website DapurKuliner siap!");

    // Contoh interaksi JS sederhananya
    const cards = document.querySelectorAll('.card-food');
    cards.forEach(card => {
        card.addEventListener('click', () => {
            alert('Fitur detail resep akan segera hadir!');
        });
    });
});
