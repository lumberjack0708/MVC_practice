import doUpdate from './doUpdate.js';
export default function showUpdatePage(){
    const id = document.getElementsByName("id");
    // let idValue;
    // for(let i=0; i<id.length; i++){
    //     if(id[i].checked){
    //         idValue = id[i].value;
    //     }
    // };
    let data = {
        "id": id,
    };
    axios.post("../backend/index.php?action=getUsers",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                // 作畫面
                const rows = response['result'];
                const row = rows[0];
                let str = `編號：<input type="text" id="id" value="` + row['id'] + `"><br>`;
                str += `密碼：<input type="text" id="password" value="` + row['password'] + `"><br>`;
                str += `email：<input type="text" id="email" value="` + row['email'] + `"><br>`;
                str += `電話：<input type="text" id="phone" value="` + row['phone'] + `"><br>`;
                str += `<button id="doUpdate" class="custom-btn">修改</button>`;
                
                // 如果 row['id'] = C110156202 => 學號：<input type="text" id="id" value="C110156202">
                document.getElementById("content").innerHTML = str;
                document.getElementById("doUpdate").onclick = function(){
                    doUpdate();
                }
                break;
            default:
                document.getElementById("content").innerHTML = response['message'];
                break;
        }
    })
    .catch(err => {
        document.getElementById("content").innerHTML = err;  
    })          
}