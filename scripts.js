
document.getElementById('add').addEventListener('click', function() {
    document.getElementsByClassName('modal')[0].style.display = 'block';
});

function closeModal() {
    document.getElementsByClassName('modal')[0].style.display = 'none';
}

document.querySelector(".closeModal").addEventListener('click', closeModal);

document.querySelector(".close").addEventListener('click', closeModal);


// DRY = Don't repeat yourself
