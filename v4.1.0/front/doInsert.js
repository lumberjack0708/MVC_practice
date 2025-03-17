export default function doInsert(){
    let data = {
         // 不再傳送 id，讓後端自動產生
         "driver_id": document.getElementById("driver_id").value,
         "password": document.getElementById("password").value,
         "email": document.getElementById("email").value,
         "phone": document.getElementById("phone").value
     };
     axios.post("../backend/index.php?action=newUser",Qs.stringify(data))
     .then(res => {
         let response = res['data'];
         document.getElementById("content").innerHTML=response['message'];
     })
     .catch(err => {
         document.getElementById("content").innerHTML=err;  
     })
 }
