let plus = document.getElementById('plus');
let minus = document.getElementById('minus');
let ocena = document.getElementById('ocena');
let potvrdi = document.getElementById('potvrdiOcenu')
let o = 5;
ocena.innerHTML =  o;
plus.addEventListener('click', () => {
    if(o <= 10) {
        o++;
    }
    else {
        o+=0;
    }
    ocena.innerHTML = o;

});

minus.addEventListener('click', () => {
    if(o > 5) {
        o--;
    }
    else {
        o-=0;
    }
    ocena.innerHTML = o;

});
potvrdi.addEventListener('click', () => {
    if (o==5) {
        alert('Pogrešna ocena! :(')
    }
    if (o==6) {
        alert('Pogrešna ocena! :(')
    }
    if (o==7) {
        alert('Pogrešna ocena! :(')
    }
    if (o==8) {
        alert('Pogrešna ocena! :(')
    
    }if (o==9) {
        alert('Pogrešna ocena! :(')
    }
    if (o==10) {
        alert('Hvala! :)')
    }
    if (o==11) {
        alert('Znam da je predobro, ali 10 je maksimalna ocena :*')
    }

});