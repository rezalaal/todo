// DRY = Don't repeat yourself
// Tags we need
const addBtn = document.getElementById('add')
const modal = document.getElementsByClassName('modal')
const closeModalX = document.querySelector(".closeModal")
const closeCancel = document.querySelector(".close")
const saveTaskBtn = document.querySelector("#saveTask");

// Events
addBtn.addEventListener('click', openModal);
closeModalX.addEventListener('click', closeModal);
closeCancel.addEventListener('click', closeModal);
saveTaskBtn.addEventListener('click', saveTask);

// On page load 
document.addEventListener("DOMContentLoaded", refreshTasks)