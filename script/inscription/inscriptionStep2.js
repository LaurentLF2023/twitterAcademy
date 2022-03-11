let register = document.querySelector('#register')
let title = document.getElementById('card-title')


register.addEventListener('submit', (e) =>{
    e.preventDefault()
    // alert("hello")
    let form = new FormData(register)

    let validate = validation(form);

    if (validate) {   
        fetch('../../Controller/inscription/inscription_step2.php', {
            method: 'post',
            body: form
        }).then(reponse => {
            return reponse.json()
        }).then(json => {
            console.log(json)
    
            if(json.pwdMatch == "no") {
                createAlert(title, "Les deux mot de passe ne sont pas identiques");
            }
            if(json.newUser == "failed") {
                alert('erreur sql')
            }
            if(json.newUser == "exist") {
                createAlert(title, "Nom d'utilisateur déjà existant !");
            }
            if(json.newUser == "success") {
                alert('compte créé !')
                window.location.href = "../../View/connexion.php"
            }
        });
    }
});