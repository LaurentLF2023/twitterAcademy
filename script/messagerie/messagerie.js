let source = new EventSource('../../Controller/messagerie/check_serv_msg.php')
let mem = 0
source.onmessage = function(event) {
    if(mem != event.data) {
        getMessages()
        mem = event.data
    }

    // console.log(event.data)
  };
let chatList            = document.getElementsByClassName('chat_list')
let chatPeople          = document.getElementsByClassName('chat_people')
let chatImg             = document.getElementsByClassName('chat_img')
let friendName          = document.getElementsByClassName('friend_name')
let chatDate            = document.getElementsByClassName('chat_date')
let lastMessage         = document.getElementsByClassName('last_message')
let formMsg             = document.querySelector('.message_form')
let activeChatFriend    = document.querySelector('.active_chat.chat_people.chat_ib.friend_name')
let activeChatContainer = document.getElementsByClassName("msg_history")
let writeMsg            = document.getElementsByClassName("write_msg")
let inboxContainer      = document.querySelector('.inbox_chat')

//scroll automatiquement la <div> de chat vers le bas
document.getElementsByClassName("msg_history").scrollTop = document.getElementsByClassName("msg_history").scrollHeight;

//envoie du message écrit vers la db, en ajax pour éviter le rechargement de page
formMsg.addEventListener('submit', (e) =>{
    e.preventDefault()
    
    let sendingMsg  = new FormData(formMsg)

    fetch('../../Controller/messagerie/postMsg.php', {
        method: 'POST',
        body: sendingMsg
    }).then(reponse => {
        return reponse.json()

    }).then(json => {
    })
    writeMsg[0].value = "";
})

// recupération des messages de la conversation en cours dans la db
function getMessages(){

    fetch('../../Controller/messagerie/getMsg.php', {
        method: 'GET'
    }).then(reponse => {
        return reponse.json()
    }).then(json => {
        let result = json.result

        //on déroule les éléments de l'objet JS pour en détailler les infos
        for (let message in result){

            let idFrom     = result[message]['id_from']
            let idTo       = result[message]['id_to']
            let currentMsg = result[message]['message_content'];
            let msgDate    = result[message]['message_date'];

            let temp = ''

            // on différencie les messages envoyés et les messages reçus
            if (idFrom){

                temp =`
                <msg-from id-from="${idFrom}" msg-date="${msgDate}" msg="${currentMsg}"></msg-from>
                `             
                
            } if(idTo){

                temp = `
                <msg-to id-to="${idTo}" msg-date="${msgDate}" msg="${currentMsg}"></msg-to>
                `
                // console.log(temp)
            } 
            activeChatContainer[0].innerHTML += temp

        }
    })
}
//obtention des messages au chargement de la page
window.addEventListener('load', getMessages)

//obtention des id, username et des derniers messages reçus ou envoyés


function setActiveChat(idTo){
    console.log(idTo)

activeId = new FormData()
activeId.set('activeId',idTo)

// go to fetch en POST pour envoyer a getMsg
    fetch('../../Controller/messagerie/getMsg.php',{
        method:'POST',
        body: activeId
    }).then(rep =>{
        return rep.json()
    }).then(json => {
        console.log('hello')
        console.log(json)
    })
}

function getFriends(){

    fetch('../../Controller/messagerie/display_friends.php',{
        method:'GET'
    }).then(reponse => {
        return reponse.json()
    }).then(json => {
        let convs = json.last_conv
        // console.log(convs)
        let temp = ''
        for (let info in convs){
            let idFrom     = convs[info]['id_from']
            let idTo       = convs[info]['id_to']
            let currentMsg = convs[info]['message_content'];
            let msgDate    = convs[info]['message_date'];
            let user       = convs[info]['username'];
    
            // /!\ en cours !!!               
            // temp +=`
            // <div id-from="${idFrom}" id-to="${idTo}" msg-date="${msgDate}" msg="${currentMsg}" username="${user}></div>
            //     `             
                // console.log('coucou')
                // console.log(temp)

                let div = document.createElement('div')
                div.classList = "chat-list"
                div.classList = "py-4 px-2"
                div.innerHTML =  `<div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="friend"> 
                </div>
                <div class="chat_ib">
                <h5 class="conv-with">${user} <span class="chat_date">${msgDate}</span></h5>
                <p>${currentMsg}</p>
                </div>
                </div>`

            //    temp+= `<div class="${idFrom}"
            //         class="${idTo}"
            //         class="chat_list"
            //         onclick="setActiveChat(event)"
            //     >
            //     <div class="chat_people">
            //         <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="friend"> 
            //         </div>
            //         <div class="chat_ib">
            //         <h5 class="conv-with">${user} <span class="chat_date">${msgDate}</span></h5>
            //         <p>${currentMsg}</p>
            //         </div>
            //         </div>
            //     </div>`
            div.addEventListener('click',() => {

                setActiveChat(idTo)
                // div.classList.add('active-chat')
                // console.log(idTo)
            }

            )

            inboxContainer.append(div)
        }
        // inboxContainer.innerHTML = temp
    })
}
window.addEventListener('load', getFriends)


