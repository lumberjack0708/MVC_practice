export default function startPage() {
    const sp = `
        <h3>面積計算</h3>
        長方形1：寬：<input type="text" id="w1"> 高：<input type="text" id="h1"><br>
        長方形2：寬：<input type="text" id="w2"> 高：<input type="text" id="h2"><br>
        圓形：半徑：<input type="text" id="radius"><br>
        <button id="cal">計算</button>
        <div id="content"></div>
    `;
    return sp;
}