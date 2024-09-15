// Dodavanje proizvoda u korpu
let ukupnaCena=0;
function dodajProizvod(element){
    let ceoProizvod = element.closest('.proizvod');
    let cena = ceoProizvod.querySelector('.cena').innerText;
    cena = parseInt(cena.substring(0, 4));
    let naziv = ceoProizvod.querySelector('.naziv').innerText;
    let korpa = document.querySelector('.proizvodiIzKorpe');

    korpa.innerHTML +=  `<h5 
    style=' 
        border-radius: 6px;
        border: 1px solid #cdb896;
        margin-top: 5px;
        position: relative;
        background-color: #f9f9f9;
        min-width: 150px;
        text-align: center;
        padding: 15px;
        z-index: 1;'
    >Naziv proizvoda: ${naziv} <br> Cena: <span>${cena}</span> RSD<br>
    <button onclick="ukloniIzKorpe(this)" class="ukloniDugme"
    style='
        color: #000;
        padding:5px;
        border-radius: 5px;
        margin: 3px;
        background-color: #f5f1ea;
        border: 2px solid #b9a687;'
    >Ukloni</button>
    </h5>`;
    ukupnaCena += cena;
    document.querySelector('.ukupnaCena').innerText =`Ukupna cena: ${ukupnaCena} RSD`;
};
// Uklanjanje proizvoda iz korpe
function ukloniIzKorpe(element){
    let ceoProizvod = element.closest('h5');
    let cena = ceoProizvod.querySelector('h5 span').innerText;
    cena = parseInt(cena);
    ukupnaCena -= cena;
    ceoProizvod.remove();
    document.querySelector('.ukupnaCena').innerText =`Ukupna cena: ${ukupnaCena} RSD`;
};
// Ukupna cena proizvoda iz korpe
console.log(ukupnaCena);
let poruci = document.getElementById('porucivanje');
poruci.addEventListener('click', () => {
    console.log(ukupnaCena);
    if (ukupnaCena == 0) {
        alert('Vaša korpa je prazna!');}
    else {alert(`Vaša porudžbina je primljena! Cena iznosi: ${ukupnaCena}`);}
});
