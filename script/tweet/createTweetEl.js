class MyTweet extends HTMLElement {
    constructor() {
        super()
        // this.attachShadow({mode: 'open'})
        this.innerHTML = `
        <form class="card my-1 m-auto tweet" action='./' method='POST'>
            <div class="card-body d-flex">
                <div class="rounded-circle m-4">
                    <img src="https://placekitten.com/60/60" class="rounded-circle" alt="...">
                </div>
                <input type="text" value="${this.getAttribute('id_tweet')}" name="id_tweet" hidden>
                <div class="w-75">
                    <div class='d-flex'>
                        <h5 class="card-title me-2 fw-bold">${this.getAttribute('displayname')}</h5>
                        <span>${this.getAttribute('username')}</span>
                    </div>
                    <p class="card-text">${this.getAttribute('content')}</p>
                    <input class="btn btn-violet float-end" value="Retweet" type='submit'>
                </div>
            </div>
        </form>`

        this.tweet = this.querySelector('form')
        this.tweet.onsubmit = (e) => {
            e.preventDefault()
            console.log(this.tweet)
            let form = new FormData(this.tweet);
        
                fetch('../Controller/tweet/retweet.php', {
                    method: 'post',
                    body: form
                }).then(response => {
                    return response.json()
                }).then(json => {
                    // console.log(json)
        
                    if(json.result == "0") {
                        alert("Une erreur technique est survenue.")
                    }
        
                    if(json.result == "1") {
                        location.reload()
                        // textAreaTweet.value = ""
                        // alert("Retweet (y) !")
                    }
                });
            }
    }

}

// "<a href="/">${this.getAttribute('hashtag')}<a/>"

window.customElements.define('my-tweet', MyTweet)

class MyInsidetweet extends HTMLElement{
    constructor() {
        super()
        // this.attachShadow({mode: 'open'})
        this.innerHTML = `
        <form class="card my-1 m-auto tweet" action='./' method='POST'>
            <div class="card-body d-flex">
                <div class="rounded-circle m-4">
                    <img src="https://placekitten.com/64/60" class="rounded-circle" alt="...">
                </div>
                <div class="w-75">
                    <div class='d-flex'>
                        <h5 class="card-title me-2 fw-bold">${this.getAttribute('displayname')}</h5>
                        <span>${this.getAttribute('username')}</span>
                    </div>
                    <p class="card-text">${this.getAttribute('content')}</p>
                </div>
            </div>
        </form>`
    }
}
window.customElements.define('my-insidetweet', MyInsidetweet)

class MyReTweet extends HTMLElement {
    constructor() {
        super()

        this.innerHTML = `
        <form class="card my-1 m-auto tweet" action='./' method='POST'>
            <div class="card-body d-flex">
                <div class="rounded-circle m-4">
                    <img src="https://placekitten.com/64/60" class="rounded-circle" alt="...">
                </div>
                <div class="w-75">
                <input type="text" value="${this.getAttribute('id_retweet')}" class="id_retweet" name="id_retweet" hidden>
                    <div class='d-flex'>
                        <h5 class="card-title me-2 fw-bold">${this.getAttribute('displayname')}</h5>
                        <span>${this.getAttribute('username')}</span>
                    </div>
                    <p class="card-text">${this.getAttribute('content')}</p>
                </div>
            </div>
        </form>`
        this.content = this.querySelector('.card-text')
         let id = this.querySelector('.id_retweet')
         let data = {
         id: id.value
        }
         let form = new FormData()
        form.set('submit', JSON.stringify(data))
            fetch('../../Controller/tweet/retweet_fetch.php', {
             method: 'post',
             body: form
         }).then(reponse => {
                return reponse.json()
         }).then(json => {
            let hash = "#";
            let words
            let content = ""
            let usernameData = json.hello['username']
            let userId = json.hello['UserId']
            let username = `<a href='profile.php?p=${userId}'>@${usernameData}</a>`
            let fullContent = json.hello['content']
                words = fullContent.split(' ')
                for(let i = 0; i < words.length; i++ ) {
                    if(words[i].substring(0, 1) === hash) {
                        content += `<a href='recherche.php?hash=${words[i].substring(1)}'>${words[i]}</a> `
                    } else {
                        let word = words[i] + ' '
                        content += word
                    }
                }
                if(json.hello['path'] != null) {
                    // console.log(json.hello['path'])
                    content += `<img class='w-50 d-block' src='${json.hello['path']}'>`
                }
             // console.log(json)
             this.content.innerHTML = `<my-insidetweet username="${username}" displayname="${json.hello['display_name']}" content="${content}"></my-insidetweet>`
         })
    }
    
    
}

// "<a href="/">${this.getAttribute('hashtag')}<a/>"

window.customElements.define('my-retweet', MyReTweet)


