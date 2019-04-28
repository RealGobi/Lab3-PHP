const printHoroscope = document.getElementById('save');
const btn_save = document.getElementById("button1").disabled = false;
const btn_update = document.getElementById("button2").disabled = true;
const btn_kill = document.getElementById("button3").disabled = true;

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
  document.getElementById("button1").disabled = true;
  document.getElementById("button2").disabled = false;
  document.getElementById("button3").disabled = false;
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
  document.getElementById("button1").disabled = true;
  document.getElementById("button2").disabled = true;
  document.getElementById("button3").disabled = false;
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
  document.getElementById("button1").disabled = false;
  document.getElementById("button2").disabled = true;
  document.getElementById("button3").disabled = true;
    var requestData = new FormData()
    makeReq("deleteHoroscope.php", "DELETE", requestData, (response)=>{
        console.log(response)
        document.getElementById("date").value = "";
    printHoroscope.innerText = '';
    })
}
