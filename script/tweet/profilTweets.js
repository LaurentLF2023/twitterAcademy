// let source = new EventSource('../../Controller/tweet/check_serv.php')
// let mem = 0
// source.onmessage = function(event) {
//     if(mem != event.data) {
//         tweetFetchPerso()
//         mem = event.data
//     }

//     // console.log(mem)
//   };

let tweetContainer = document.getElementById('tweets')
// console.log(tweetContainer)
window.addEventListener('load', (e) => {
    tweetFetchAll('tweet/profil_tweets.php')
})