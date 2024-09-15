    let ime = document.getElementById('ime');
    let email = document.getElementById('email');
    let naslovPoruke = document.getElementById('naslovPoruke');
    let poruka = document.getElementById('poruka');

    let posalji = document.getElementById("posalji");

posalji.addEventListener('click', (event) => {
    event.preventDefault();

    let nastavi = true;

    let vrednostIme = ime.value;
    let vrednostEmail = email.value;
    let vrednostNaslovPoruke = naslovPoruke.value;
    let vrednostPoruka = poruka.value; 

    if (nastavi && vrednostIme == ''){
        alert('Obavezno unesite ime i prezime!');
        nastavi = false;
    };
    if (nastavi && vrednostNaslovPoruke == ''){
        alert('Obavezno unesite naslov poruke!');
        nastavi = false;
    };
    if (nastavi && vrednostPoruka == ''){
        alert('Obavezno unesite poruku!');
        nastavi = false;
    };
    if (nastavi && !(vrednostEmail.includes('@')) && !(vrednostEmail.includes('.'))){
        nastavi = false;
        alert('Morate uneti validan e-mail!');
    };

    let pozicijaAt = vrednostEmail.indexOf('@');
    let pozicijaTacka = vrednostEmail.indexOf('.');

    let pocetak = pozicijaAt + 1 - 0 - 1;
    let sredina = pozicijaTacka - pozicijaAt - 1;
    let kraj = vrednostEmail.length - pozicijaTacka - 1;
    console.log(pocetak, sredina, kraj);

    if ((nastavi && (pocetak == 0 || sredina == 0 || kraj == 0))){
        nastavi = false;
        alert('Morate uneti validan e-mail!');
    }
    
    if (nastavi){
        alert('Vaša poruka je primljena');
        window.location.reload();
    }
})

