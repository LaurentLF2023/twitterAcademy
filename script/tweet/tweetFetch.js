function tweetFetchAll(phpFile) {
    fetch('../../Controller/' + phpFile, {
        method: 'get'
    }).then(reponse => {
        return reponse.json()
    }).then(json => {
        let resultats = json.results
        console.log(resultats)
        tweetContainer.innerHTML = ""
        
        let temp = ""
        for(let info in resultats) {
            let hash = "#";
            let words
            let content = ""
            let usernameData = resultats[info]['username']
            let userId = resultats[info]['UserId']
            let username = `<a href='profile.php?p=${userId}'>@${usernameData}</a>`
            
            if(resultats[info]['RetweetId'] != undefined) {
                temp += `
                <my-retweet username="${username}" displayname="${resultats[info]['display_name']}" id_retweet="${resultats[info]['RetweetId']}"></my-retweet>`
            } else {
                let fullContent = resultats[info]['content']
                words = fullContent.split(' ')
                for(let i = 0; i < words.length; i++ ) {
                    if(words[i].substring(0, 1) === hash) {
                        content += `<a href='recherche.php?hash=${words[i].substring(1)}'>${words[i]}</a> `
                    } else {
                        word = words[i] + ' '
                        content += word
                    }
                }
                if(resultats[info]['path'] != null) {
                    // console.log(resultats[info]['path'])
                    content += `<img class='w-50 d-block' src='${resultats[info]['path']}'>`
                }
                temp += `
                <my-tweet username="${username}" displayname="${resultats[info]['display_name']}" content="${content}" id_tweet='${resultats[info]['TweetId']}'></my-tweet>`
            }
            
        }
        tweetContainer.innerHTML =  temp
    })
}