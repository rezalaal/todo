function getAllTasks()
{
    fetch('http://localhost/todo/api/mysql.php')
    .then(response => response.json())
    .then(data =>{
        showTasks(data.tasks)
    })
    
    
}

function showTasks(tasks)
{
    const content = document.querySelector("#content")
    content.innerHTML = ''
    tasks.forEach(task => {
        // console.log(task[1])
        content.innerHTML += '<li>' + task[1] + '</li>'
    })
}
document.addEventListener('DOMContentLoaded', getAllTasks);