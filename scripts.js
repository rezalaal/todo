async function getQuote() {
    await fetch('http://api.quotable.io/random')
        .then(response => response.json())
        .then(data => showOnContent(data))
        .catch(error => console.error(error));
}

function showOnContent(data) {
    document.querySelector('#content').innerHTML = `<p style='color:red;'>` + data.content + '</p>';
    document.querySelector('#author'),innerHTML = data.author;
}

function showTest(data) {
    document.querySelector('#local').innerHTML = data.message;
}

document.addEventListener('DOMContentLoaded', function () {
    fetch('http://localhost:8009')
        .then(response => response.json())
        .then(data => showTest(data))
        .catch(error => console.error(error));
    getQuote()
});