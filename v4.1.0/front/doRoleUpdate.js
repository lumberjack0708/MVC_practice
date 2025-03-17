export default function doRoleUpdate(){
    const role_id = document.getElementById("role_id").value;
    const role_name = document.getElementById("role_name").value;
    
    let data = { role_id, role_name };
    
    axios.post("../backend/index.php?action=updateRole", Qs.stringify(data))
    .then(res => {
         let response = res.data;
         if(response.status === 200){
             document.getElementById("content").innerHTML = "更新成功";
             // 成功後延遲1秒重新載入角色列表
             setTimeout(() => {
                 const event = new Event('click');
                 document.getElementById('role').dispatchEvent(event);
             }, 1000);
         } else {
             document.getElementById("content").innerHTML = "更新失敗：" + response.message;
         }
    })
    .catch(err => {
         document.getElementById("content").innerHTML = "更新失敗：" + err;
    });
}