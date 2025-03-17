export default function doUpdate(){
    // 重新從 DOM 中取得更新後的欄位值
    let id = document.getElementById("id").value;
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    
    let data = { id, password, email, phone };
    
    axios.post("../backend/index.php?action=updateUser", Qs.stringify(data))
    .then(res => {
         let response = res.data;
         if(response.status === 200){
             document.getElementById("content").innerHTML = "更新成功";
         } else {
             document.getElementById("content").innerHTML = "更新失敗：" + response.message;
         }
    })
    .catch(err => {
         document.getElementById("content").innerHTML = "更新失敗：" + err;
    });
}
