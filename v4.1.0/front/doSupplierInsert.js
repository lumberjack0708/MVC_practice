export default function doSupplierInsert(){
    let data = {
         "s_name": document.getElementById("s_name").value,
         "contact": document.getElementById("contact").value,
         "tel": document.getElementById("tel").value,
         "address": document.getElementById("address").value
     };
     
     // 簡單驗證
     if (!data.s_name) {
         document.getElementById("content").innerHTML = "供應商名稱不可為空";
         return;
     }
     
     axios.post("../backend/index.php?action=newSupplier", Qs.stringify(data))
     .then(res => {
         let response = res['data'];
         document.getElementById("content").innerHTML = response['message'];
         // 成功後延遲1秒重新載入供應商列表
         if(response['status'] === 200) {
             setTimeout(() => {
                 const event = new Event('click');
                 document.getElementById('supplier').dispatchEvent(event);
             }, 1000);
         }
     })
     .catch(err => {
         document.getElementById("content").innerHTML = err;  
     });
}