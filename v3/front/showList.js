import showUpdatePage from './showUpdatePage.js';
import doDelete from './doDelete.js';

function showDeleteList(){
    showList("delete");
}
function showUpdateList(){
    showList("update");
}
function showList(type){
    axios.get("../backend/index.php?action=getUsers")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //作資料列表
                const rows = response['result'];
                let str = '<table>';
                rows.forEach(element => {
                    str += "<tr>";
                    const idstr = "<input type='radio' id='id' name=id value='" + element['id'] + "'>";
                    str += "<td>" + idstr + "</td>";
                    str += "<td>" + element['password'] + "</td>";
                    str += "<td>" + element['email'] + "</td>";
                    str += "<td>" + element['phone'] + "</td>";
                    str += "</tr>";
                });
                str += '</table>';

                //根據type產出修改或刪除鍵
                if(type=="delete"){
                    str += `<button id="doDelete">刪除</button>`;
                    document.getElementById("content").innerHTML=str;
                    document.getElementById("doDelete").onclick = function(){
                        doDelete();
                    };
                }
                else{
                    str += `<button id="showUpdatePage">修改</button>`;
                    document.getElementById("content").innerHTML=str;
                    document.getElementById("showUpdatePage").onclick = function(){
                        showUpdatePage();
                    };
                }
                break;
            default:
                document.getElementById("content").innerHTML=response['message'];
                break;
        }
    })
    .catch(err => {
        document.getElementById("content").innerHTML=err;  
    }) 
}
export { showUpdateList, showDeleteList };
