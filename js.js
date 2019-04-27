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

})
}
