
document.getElementById('add').addEventListener('click', function() {
    document.getElementsByClassName('modal')[0].style.display = 'block';
});

function closeModal() {
    document.getElementsByClassName('modal')[0].style.display = 'none';
}

document.querySelector(".closeModal").addEventListener('click', closeModal);

document.querySelector(".close").addEventListener('click', closeModal);


// DRY = Don't repeat yourself

saveTaskBtn = document.querySelector("#saveTask");

saveTaskBtn.addEventListener('click', saveTask);
function saveTask() {

    let task = document.querySelector("#task").value;
    //validation 

    if(task.length != 0) {
        let allTasks = JSON.parse(localStorage.getItem('tasks'))
        if(!allTasks) {
            allTasks = []
        }
        
        allTasks.push(task)
    
        localStorage.setItem('tasks', JSON.stringify(allTasks))

        closeModal()
    }else{
        sp = document.querySelector(".footer");
        sp.textContent = 'error';
        sp.classList.add('error');

    }

   
}


document.addEventListener("DOMContentLoaded", function () {
    let allTasks = JSON.parse(localStorage.getItem('tasks'))
    if(!allTasks) {
        allTasks = []
    }

    allTasks.forEach(function (item) {
        document.querySelector("#taskItems").insertAdjacentHTML('beforeend', `
        <div class="item">
                <div class="item-circle"><i class="fa-sharp fa-solid fa-circle"></i></div>
                <div class="item-title">${item}</div>
                <div class="item-icon-ok"><i class="fa-solid fa-check"></i></div>
                <div class="item-icon-edit"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="item-icon-delete"><i class="fa-solid fa-trash"></i></div>
            </div>
        `)
    });
    
})