// Récupération du formulaire 
const form = document.querySelector('#form')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e) {
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');
    // 2. Je récupére la valeur de l'input
    const message = document.querySelector('#message').value
    const pseudo = document.querySelector('#pseudo').value
    const ipUser = document.querySelector('#ipUser').value
    console.log(message)
    

    // Préparer les données de la requete
    let formData = new FormData()
    formData.append('pseudo', pseudo)
    formData.append('ipUser', ipUser )
    formData.append('message', message)

    // 3. Je lance ma requête en js à la place du formulaire
    fetch('./process/addUserAndMessage.php', {
        method: "POST", 
        body: formData
    }).then((response)=>{
        return response.text()
    }).then((data)=>{
        // 4. Je vide l'input
        document.querySelector('#message').value ='' 
        document.querySelector('#pseudo').value ='' 
        getMessage()
        getUser()
    })

})




async function getMessage(){
    const response = await fetch('./process/listMessage.php');
    const data = await response.json();
    console.log(data);
    let ul = document.querySelector('#listUser');
    ul.innerHTML ="";
    data.forEach(todo => {

        ul.innerHTML += `
            <li class='bg-white text- p-2'><span class='fw-bold'> ${todo.pseudo} </span> : ${todo.message}</li>
         `
    });


}
async function getUser(){
    const r = await fetch('./process/listUser.php');
    const dataUser = await r.json();
    console.log(dataUser);
    let ulUser = document.querySelector('#list')

    ulUser.innerHTML = ``
    dataUser.forEach(user => {
        ulUser.innerHTML += `
        <li class='bg-white'><i class="fa-solid fa-user m-2" style="color: #000000;"></i>${user.pseudo}</li>
        `
    })


}
setInterval(() => {
    getMessage()
}, 3000);
setInterval(() => {
    getUser()
}, 2000);


