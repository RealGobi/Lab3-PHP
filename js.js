const printHoroscope = document.getElementById('save');


function makeReq(url, method, requestData, callback) {
    var headers;
    if(method == "GET") {
      headers = {
        method: method
      }
    } else {
      headers = {
        method: method,
        body: requestData
      }
    }
    fetch(url, headers)
    .then((data) => {
      return data.json()
    }).then((result) => {
      callback(result)
    }).catch((err) => {
      console.log(err)
    })
   }

function save(){
   let vald = document.getElementById('date').value;
   let dieYear = vald.slice(5,10);
   let date = dieYear.replace('-','/');
   console.log(date);
   
    var requestData = new FormData()
    requestData.append("collectionType", "current");
    requestData.append("inputDate", date);
    makeReq("function.php", "POST", requestData, (response)=>{
        console.log(response) 
})
}

function print () {
    var requestData = new FormData()
    makeReq("viewHoroscope.php", "GET", requestData, (response)=>{
        console.log(response)
    printHoroscope.innerText = response;
    })
}

function update () {
    let valt = document.getElementById('date').value;
    let year = valt.slice(5,10);
    let dateUp = year.replace('-','/');
    var requestData = new FormData()
    requestData.append("collectionType", "update");
    requestData.append("inputDate", dateUp);
    makeReq("function.php", "POST", requestData, (response)=>{
        console.log(response)  
        print();
})
}

 function kill () {
    var requestData = new FormData()
    makeReq("deleteHoroscope.php", "DELETE", requestData, (response)=>{
        console.log(response)
        document.getElementById("date").value = "";
    printHoroscope.innerText = '';
    })
}
