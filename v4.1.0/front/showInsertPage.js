import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str = `
        <table class="custom-table">
            <br/>
            <tr>
                <td>車手號碼：</td>
                <td><input type="text" id="driver_id"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="password" id="password"></td>
            </tr>
            <tr>
                <td>email：</td>
                <td><input type="text" id="email"></td>
            </tr>
            <tr>
                <td>電話：</td>
                <td><input type="text" id="phone"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button id="doinsert" class="custom-btn">新增</button></td>
            </tr>
        </table>
    `;
    document.getElementById("content").innerHTML = str;
    document.getElementById("doinsert").onclick = function(){
        doInsert();
    };
}
