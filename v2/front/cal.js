export default function cal() {
    // 接收參數
    const data = {
        "w1": document.getElementById("w1").value,
        "h1": document.getElementById("h1").value,
        "w2": document.getElementById("w2").value,
        "h2": document.getElementById("h2").value,
        "radius": document.getElementById("radius").value
    };

    // 發送Axios請求
    axios.post("../backend/main_p3.php?action=GetAllArea", Qs.stringify(data))
    .then(res => {
        console.log(res);   
        let response = res["data"];
        console.log(response);
        console.log(response['status']);
        if (response['status'] == 200){
            let result = response['result'];
            console.log(result);
            let html = "長方形1面積：" + result[0] + "<br>" +
                        "長方形2面積：" + result[1] + "<br>" +
                        "圓形面積：" + result[2] + "<br>" 
            document.getElementById("content").innerHTML = html;
        }
        else {
            document.getElementById("content").innerHTML = "<strong>錯誤：</strong>無法取得計算結果。";
        }
    })
    .catch(err => {
        console.error(err);
        document.getElementById("content").innerHTML = "<strong>錯誤：</strong>計算失敗，請稍後再試。";
    });
}