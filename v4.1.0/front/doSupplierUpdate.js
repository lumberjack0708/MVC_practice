export default function doSupplierUpdate(){
    let sid = document.getElementById("sid").value;
    let s_name = document.getElementById("s_name").value;
    let contact = document.getElementById("contact").value;
    let tel = document.getElementById("tel").value;
    let address = document.getElementById("address").value;
    
    // 簡單驗證
    if (!s_name) {
        document.getElementById("content").innerHTML = "供應商名稱不可為空";
        return;
    }
    
    let data = { sid, s_name, contact, tel, address };
    console.log("準備更新供應商資料:", data);
    
    axios.post("../backend/index.php?action=updateSupplier", Qs.stringify(data))
    .then(res => {
         console.log("更新回應:", res.data);
         let response = res.data;
         if(response.status === 200){
             document.getElementById("content").innerHTML = "更新成功";
             // 成功後延遲1秒重新載入供應商列表
             setTimeout(() => {
                 const event = new Event('click');
                 document.getElementById('supplier').dispatchEvent(event);
             }, 1000);
         } else {
             document.getElementById("content").innerHTML = "更新失敗：" + response.message;
         }
    })
    .catch(err => {
         console.error("更新錯誤:", err);
         document.getElementById("content").innerHTML = "更新失敗：" + err;
    });
}