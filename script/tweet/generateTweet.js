let source = new EventSource('../../Controller/tweet/check_serv.php')
let mem = 0
source.onmessage = function(event) {
    if(mem != event.data) {
        tweetFetchAll('tweet/generate_tweet.php')
        mem = event.data
    }

    // console.log(mem)
  };

let tweetContainer = document.getElementById('tweets')
window.addEventListener('load', (e) => {
    tweetFetchAll('tweet/generate_tweet.php')
})
