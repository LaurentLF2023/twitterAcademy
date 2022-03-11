

// inclure un bouton de téléchargelent de fichiers (html : file input) mais en boottrap}
// console.log('hello')

const submitTweet = document.querySelector('#form');
const textAreaTweet = document.getElementById('textAreaTweet')
const fichierContainer = document.getElementById('fichier-container')
const hiddenFileInput = document.getElementById('hiddenFileInput')

submitTweet.addEventListener('submit', (event) =>{
    event.preventDefault();
    
    // console.log("Désolé ! preventDefault() ne vous laissera pas cocher ceci.");

    let form = new FormData(submitTweet);
    // let validate = validation(form);

        fetch('../Controller/tweet/add_tweet.php', {
            method: 'post',
            body: form
        }).then(response => {
            return response.json()
        }).then(json => {
            // console.log(json)

            if(json.success == "0") {
                alert("Une erreur technique est survenue.")
            }

            if(json.success == "1") {
                textAreaTweet.value = ""
                fichierContainer.innerHTML = ""
                hiddenFileInput.value = ""
                // alert("Tweet envoyé !")
            }
        });




} ) 