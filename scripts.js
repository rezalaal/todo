// async function getRandomNumberFromAPI() {
//     const formData = new FormData();
//     formData.append('min', 0);
//     formData.append('max', 999);
  
//     const response = await fetch('http://localhost:8009/', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/x-www-form-urlencoded'
//       },
//       body: new URLSearchParams(formData)
//     });
  
//     const data = await response.json();
//     console.log(data);
//     addToMessageBox(data.message);
//   }

async function getRandomNumberFromAPI()
{
    const items = { min: 0, max: 999999 };

   const response = await fetch('http://localhost:8009/', {
    method: "POST",
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(items)
   });   

   const data = await response.json();
   console.log(data)

   addToMessageBox(data.message)
}

function addToMessageBox(message) 
{
    const content = document.querySelector("#content");
    content.innerHTML = 'Random number is: ' + message

}

getRandomNumberFromAPI()