let register = document.querySelector('.subscribe_form')
let title = document.getElementById('card-title')

register.addEventListener('submit', (e) =>{
    e.preventDefault()
    // alert("hello")
    let form = new FormData(register)

    let validate = validation(form);

    if (validate) {
        fetch('../../Controller/inscription/inscription_step1.php', {
            method: 'post',
            body: form
        }).then(reponse => {
            return reponse.json()
        }).then(json => {
            console.log(json)
    
            if(json.age == "0") {
                createAlert(title, "Vous n'avez pas l'âge requis");
            }
            if(json.email == "0") {
                createAlert(title, "L'email existe déjà");
            }
            if(json.sucess == "1") {
               window.location.href = "../../View/inscription2.php"
            } 
        });
    }

});




/* 

selec le form
event listener le submit 
preventdefault pour pas qu'il s'envoie

selec tout tout
fetch envoyé : post

body: form

.then(php) {
    json.age > alert( sur le form / trop jeune pour s'inscrire)


    function js à la place de l'alert
}

*/