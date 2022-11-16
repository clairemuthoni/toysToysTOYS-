const fname = document.getElementById('buname')

const email = document.getElementById('email')

const number = document.getElementById('pnumber')

const label = document.getElementById('lname')

fname.addEventListener('click', username );

function username(){
    (e) => {
        label.innerHTML ='<input type="text" name="uname">';
        e.preventDefault();
    }
}