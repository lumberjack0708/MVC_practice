import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    // 直接使用傳入的 id 參數，而不是從 DOM 讀取
    let data = {
        "id": id,
    };
    axios.post("../backend/index.php?action=getUsers", Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                // 作畫面 - 使用表格樣式來美化
                const rows = response['result'];
                const row = rows[0];
                
                let str = `<h2>修改使用者資料</h2>`;
                str += `<table class="custom-table">`;
                str += `<tr>
                          <td>員工編號：</td>
                          <td><input type="text" id="id" value="${row['id']}"></td>
                        </tr>`;
                str += `<tr>
                          <td>車手號碼：</td>
                          <td><input type="text" id="driver_id" value="${row['driver_id'] || ''}"></td>
                        </tr>`;
                str += `<tr>
                          <td>密碼：</td>
                          <td><input type="text" id="password" value="${row['password']}"></td>
                        </tr>`;
                str += `<tr>
                          <td>email：</td>
                          <td><input type="email" id="email" value="${row['email']}"></td>
                        </tr>`;
                str += `<tr>
                          <td>電話：</td>
                          <td><input type="text" id="phone" value="${row['phone']}"></td>
                        </tr>`;
                str += `<tr>
                          <td colspan="2" style="text-align: center;">
                            <button id="doUpdate" class="custom-btn">確認修改</button>
                            <button id="backToList" class="custom-btn">返回列表</button>
                          </td>
                        </tr>`;
                str += `</table>`;
                
                document.getElementById("content").innerHTML = str;
                document.getElementById("doUpdate").onclick = function(){
                    doUpdate();
                };
                document.getElementById("backToList").onclick = function(){
                    window.location.reload(); // 簡易的返回列表方法，或者調用員工列表函數
                };
                break;
            default:
                document.getElementById("content").innerHTML = response['message'];
                break;
        }
    })
    .catch(err => {
        document.getElementById("content").innerHTML = err;  
    });          
}