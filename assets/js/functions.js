
function closeModal() {
    const modal = document.getElementsByClassName('modal')
    modal[0].style.display = 'none';
}

function openModal() {
    const modal = document.getElementsByClassName('modal')
    modal[0].style.display = 'block';
}

function getAllTasks() {
    let allTasks = JSON.parse(localStorage.getItem('tasks'))
    if(!allTasks) {
        allTasks = []
    }

    return allTasks
}

function saveTask() {
    const taskItems = document.querySelector("#taskItems")
    let task = document.querySelector("#task").value;

    if(task.length != 0) {
        allTasks = getAllTasks()        
        allTasks.push({id: allTasks.length + 1, title: task, isDone: false})    
        localStorage.setItem('tasks', JSON.stringify(allTasks))
        closeModal()
        taskItems.innerHTML = ''
        refreshTasks()
    }else{
        sp = document.querySelector(".footer");
        sp.textContent = 'Task is empty!';
        sp.classList.add('error');
    }   
}

function refreshTasks() {
    const taskItems = document.querySelector("#taskItems")
    
    allTasks = getAllTasks()
    allTasks.sort((a, b) => a.id - b.id)
    allTasks.forEach(function (item) {
    taskItems.insertAdjacentHTML('beforeend', `
        <div class="item">
            <div class="item-circle"><i class="fa-sharp fa-solid fa-circle"></i></div>
            <div class="item-title ${item.isDone ? 'isDone' : ''}">${item.title}</div>
            <div class="item-icon-ok" data-id=${item.id}><i class="fa-solid fa-check"></i></div>
            <div class="item-icon-edit" data-id=${item.id}><i class="fa-solid fa-pen-to-square"></i></div>
            <div class="item-icon-delete" data-id=${item.id}><i class="fa-solid fa-trash"></i></div>
        </div>
        `)
    });

    const itemsDelete = document.querySelectorAll(".item-icon-delete")    
    itemsDelete.forEach(function (item) {
        item.addEventListener('click', function () {
            allTasks = getAllTasks()
            newTasks = allTasks.filter(function (listItem) {
                if(listItem.id != item.attributes[1].value) {
                    return item
                }
            })

            localStorage.setItem('tasks', JSON.stringify(newTasks))
            taskItems.innerHTML = ''
            refreshTasks()
        })
    })

    const itemsOK = document.querySelectorAll(".item-icon-ok") 
    itemsOK.forEach(function (item) {
        item.addEventListener('click', function () {
            allTasks = getAllTasks()
            newTask = allTasks.filter(function (listItem) {
                if(listItem.id == item.attributes[1].value) {
                    return item
                }
            })
            if ( newTask[0].isDone ) {
                newTask[0].isDone = false
            }else{
                newTask[0].isDone = true
            }

            newList = allTasks.filter(function (listItem) {
                if(listItem.id != item.attributes[1].value) {
                    return item
                }
            })

            newList.push({
                id: newTask[0].id,
                title: newTask[0].title,
                isDone: newTask[0].isDone
            })
            localStorage.setItem('tasks', JSON.stringify(newList))
            taskItems.innerHTML = ''
            refreshTasks()
        })
    })
}
                
