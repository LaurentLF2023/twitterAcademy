let list = document.querySelectorAll(".pwd")

list.forEach(element => {
  let input = document.querySelector(element.dataset.target);
    element.addEventListener('click',() => {
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
    });
});  

/* 

Je créé une variable "list" qui contient TOUTES les classes .pwd (checkbox).

Pour chaque élements de ma liste (checkbox) {
  Je créé une variable input qui sélectionne mes élements ayant "data-target" (input)
      je créé un évenement ('click') qui fera une action à chaque clique sur la checkbox {
        si le type de l'input est "password" {
          son type devient "text"
        } sinon {
          son type devient "password"
        }
    }
}

*/