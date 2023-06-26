function getQuote() {
    fetch('http://api.quotable.io/random')
        .then(response => response.json())
        .then(data => showOnContent(data))
        .catch(error => console.error(error));
}

function showOnContent(data) {
    document.querySelector('#content').innerHTML = `<p style='color:red;'>` + data.content + '</p><br>' + data.author;
}

document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/index.php', {
        method: GET,
        headers: {
            'Access-Control-Allow-Origin' : '*'
        } 
    })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
    // getQuote()
});