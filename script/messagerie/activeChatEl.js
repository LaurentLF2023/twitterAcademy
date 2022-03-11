//Création de templates HTML avec des éléments HTML custom

//ici, les éléments pour la div inbox_chat
// class inboxChat extends HTMLElement {
//     constructor(){
//         super()

//         this.innerHTML =`
//         <div class="${this.getAttribute('id-from')}"
//             class="${this.getAttribute('id-to')}"
//             class="chat_list"
//             onclick="setActiveChat()"
//         >
//             <div class="chat_people">
//               <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="friend"> 
//               </div>
//               <div class="chat_ib">
//                 <h5 class="conv-with">${this.getAttribute('username')} <span class="chat_date">${this.getAttribute('msg-date')}</span></h5>
//                 <p>${this.getAttribute('msg')}</p>
//               </div>
//             </div>
//         </div>
//         `
//     }
    
// }
// window.customElements.define('in-list', inboxChat)

//ici les éléments pour les messages reçus
class ChatFrom extends HTMLElement {
    constructor(){
        super()

        this.innerHTML = `
            <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="" alt="sunil"> </div>
            <div class="received_msg">
            <div class="received_withd_msg">
                <p>${this.getAttribute('msg')}</p>
                <span class="time_date"> ${this.getAttribute('msg-date')}</span></div>
            </div>
            </div>
        `        
    }
}

window.customElements.define('msg-from', ChatFrom)

//ici les éléments pour les messages envoyés
class ChatTo extends HTMLElement {
    constructor(){
        super()

        this.innerHTML = `
            <div class="outgoing_msg">
            <div class="sent_msg">
            <p>${this.getAttribute('msg')}</p>
            <span class="time_date"> ${this.getAttribute('msg-date')}</span> </div>
            </div>
        `        
    }
}

window.customElements.define('msg-to', ChatTo)

