export default function startPage(){
    const sp = `
        <button id="insert" class="custom-btn">新員工</button>
        <button id="update" class="custom-btn">修改員工資料</button>
        <button id="delete" class="custom-btn">員工離職</button>
        <button id="select" class="custom-btn">所有員工資料</button>
        <div id="content"></div>
    `;
    return sp;
}
