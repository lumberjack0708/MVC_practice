export default function doRoleInsert(){
    let data = {
         "role_name": document.getElementById("role_name").value
     };
     
     axios.post("../backend/index.php?action=newRole", Qs.stringify(data))
     .then(res => {
         let response = res['data'];
         document.getElementById("content").innerHTML = response['message'];
         // 成功後延遲1秒重新載入角色列表
         if(response['status'] === 200) {
             setTimeout(() => {
                 const event = new Event('click');
                 document.getElementById('role').dispatchEvent(event);
             }, 1000);
         }
     })
     .catch(err => {
         document.getElementById("content").innerHTML = err;  
     });
}