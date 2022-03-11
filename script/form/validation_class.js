function validation(form) {
    for(let key of form.keys()) {
        let input = document.querySelector('[name="' + key +'"]')
        // console.log(key, form.get(key))
        if(form.get(key) == '') {
                if(input.parentElement.lastElementChild.classList.contains('invalid-feedback')){
                        // console.log(input.parentElement.lastElementChild)
                        input.parentElement.lastElementChild.remove()
                }
                input.classList.add('is-invalid')
                input.parentElement.innerHTML += '<div id="validationServer04Feedback" class="invalid-feedback">Entrez une valeur pour le champ ' + key + '</div>'
                
        } else {
            input.classList.remove('is-invalid')
            input.classList.add('is-valid')
            if(input.parentElement.lastElementChild.classList.contains('invalid-feedback')){
                input.parentElement.lastElementChild.remove()
            }
        }
    }
    for(let key of form.keys()) {
        let input = document.querySelector('[name="' + key +'"]')
        if(input.classList.contains('is-invalid')){
            return false
        }
    }
    return true
}

function createAlert(el, message) {
    console.log(el.parentElement.lastElementChild)
    if(el.parentElement.lastElementChild.classList.contains('alert')) {
        el.parentElement.lastElementChild.remove()
    }

    let alert = document.createElement("DIV");
    alert.classList.add('alert')
    alert.classList.add('alert-danger')
    let textnode = document.createTextNode(message);
    alert.appendChild(textnode)
    el.parentElement.appendChild(alert)

}

    // js / class js avec des function (validation, pas vide) bs alert error
    // age time_stamp() min 13 ans
    // username/mail not already taken

    // required / mail / 4carac mini
    // lastname, firstname, email, birthdate