// Create random number 
let randomNumber = Math.floor(Math.random() * (100)) + 1;
let count = 0;
console.log(randomNumber)
// get user number 
// const userInput = document.querySelector("#userInput");
const userInput = document.querySelector("#userInput");
const btn = document.querySelector("#btn");
const message = document.querySelector("#message");

btn.addEventListener("click", function() { 
    count++;
    userNumber = userInput.value;
        
    if(userNumber <= 0 || userNumber > 100 || !userNumber) {
        message.innerHTML = "Wrong! Enter number between 1-100";
        return;
    }

    // compare randomNumber and userNumber

    // if randomNumber = userNumber : user Win!

    // if userNumber < randomNumber : we tell to user 

    // if userNumber > randomNumber : we tell to user 

    if (userNumber == randomNumber) {
        message.innerHTML = `You win! after ${count} time`;

    }

    if (userNumber > randomNumber) {
        message.innerHTML = "Select less number";
    }

    if (userNumber < randomNumber) {
        message.innerHTML = "Select Great number";
    }
    
});


