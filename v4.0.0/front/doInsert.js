export default function doInsert(){
    let data = {
         "id": document.getElementById("id").value,
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
