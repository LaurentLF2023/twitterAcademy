let signUp = document.querySelector('.sign_up_form')
let title = document.getElementById('card-title')

signUp.addEventListener('submit', (e) =>{
    e.preventDefault()
    // alert("hello")
    let form = new FormData(signUp)

    let validate = validation(form);

    if (validate) {
        fetch('../../Controller/connexion/connect_step.php', {
            method: 'post',
            body: form
        }).then(reponse => {
            return reponse.json()
        }).then(json => {
            console.log(json)
    
            if(json.emailMatch == "0") {
                createAlert(title, "Identifiants incorrects, veuillez vérifier votre email et mot de passe.");
            }
            if(json.connexion == "failed") {
                createAlert(title, "Identifiants incorrects, veuillez vérifier votre email et mot de passe.");
            }
            if(json.connexion == "success") {
    
                window.location.href = "../../View/home_page.php"
                // à renvoyer vers homepage quand elle sera prête
            }        
        });
    }
})

