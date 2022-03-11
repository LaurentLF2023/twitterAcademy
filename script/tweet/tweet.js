const text_area = document.querySelector('#tweet_text');
const submit_btn = document.querySelector('#submit');
const char_count = document.querySelector('#charNum');
const myFileInput = document.getElementById('myFileInput')

myFileInput.onclick = (e) => {
    // console.log(e.target.dataset.name)
    let myDataset = e.target.dataset.name
    let target = document.getElementById(myDataset)
    target.click()
}
let inputs = document.getElementById("hiddenFileInput")
let container = document.getElementById('fichier-container')
console.log(container)
var file;
inputs.addEventListener('change', function(){
    var files = inputs.files
        container.innerHTML = " "
       for(let i = 0; i< files.length; i++) {
            console.log(files.length)
           file = files[i]
           console.log(container)
            let el = document.createElement('p')
            el.classList.add('mx-2')
           el.innerHTML += file.name
            container.appendChild(el)
           
       }      
})
function countChars(string){
    var maxLength = 280;
    char_count.innerHTML = string.value.length + "/" + maxLength 
}



// tweet submit : select id , addevent "click" :
// récupérer avec un fetch


