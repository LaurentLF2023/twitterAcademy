
function updateProfil(e) {
    let ourForm = e.parentElement.parentElement.querySelector('form')
    let form = new FormData(ourForm)
    console.log(form)

    fetch('../../Controller/profile/updateProfil.php', {
        method: 'post',
        body: form
    }).then( reponse => {
        return reponse.json()
    }).then( json => {
        if(json.success = 1) {
            location.reload()
        } else {
            alert('erreur SQL')
        }
    })
  }

  function myFileInput(e){
    // console.log(e.dataset.name)
    let myDataset = e.dataset.name
    let target = document.getElementById(myDataset)
    target.click()
}

function uploadPic(e) {
    let ourForm = e.parentElement
    // console.log(ourForm)
    let form = new FormData(ourForm)
    fetch('../../Controller/profile/updatePic.php', {
        method: 'post',
        body: form
    }).then( reponse => {
        return reponse.json()
    }).then( json => {
       
    })
}