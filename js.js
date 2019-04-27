
function makeReq(url, method, formData, callback){
    fetch(url, {
        method: method,
        body: formData
    }).then((data) =>{
        return data.json()
    }).then((result) =>{
        callback(result);
    }).catch((err)=>{
        console.log(err);
    })
}

function save(){
   let vald = document.getElementById('date').value;
   let dieYear = vald.slice(5,10);
   let date = dieYear.replace('-','/');
   console.log(date);
   
    var requestData = new FormData()
    requestData.append("collectionType", "current")
    requestData.append("inputDate", date);
    makeReq("function.php", "POST", requestData, (response)=>{
        console.log(response)
// skriver ut allt i js, men ska väl va i php? hmm..
    const htmlList = document.querySelector('.save');
    htmlList.innerHTML = '';
        var listItem = document.createElement('li')
        listItem.innerHTML =  JSON.stringify(response).substr(1).slice(0, -1);
        htmlList.appendChild(listItem)
    
})
}
