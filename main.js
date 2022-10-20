// fetch('https://reqres.in/api/users/$id' , {
//     method: 'GET',
//     headers: {
//         'Content-Type': 'application/json' 
//     },
    
// }).then(res => {
//     return res.json()

// })
// .then(data => console.log(data))
// .catch(error => console.log('ERROR'))

console.log('this is demo');
let myBtn = document.getElementById("myBtn");
let content = document.getElementById("content");

function getData(){
    console.log("started getdata")
    url= "haryy.txt";
    fetch(url).then(response){
        console.log("Inside fisrt then")
        return response.text();
    });
}
console.log("before running getDta")
getData()
console.log("After running getData")