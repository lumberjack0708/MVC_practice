# 練習：員工資料的CRUD
## [v4.1.0] - 2025-03-10
### 部屬方式
1. 先到`sql`資料夾中下載最新版本資料庫檔案並匯入phpmyadmin
2. 將`index.css`檔案刪除或清空內容
3. 依自己需求將各前端顯示的頁面改為自己期望的名稱(因為我的都是跟賽車有關的)
#### 更新內容
- 新增auto incurent功能，主key id將會自動新增
- 新增`產品資料`、`角色`、`供應商`三份資料表，對應欄位如下
     1. 產品資料`product`：編號`pid`(自動編號)、名稱`p_name`、成本`cost`、售價`price`、數量`stock`
     2. 角色`role`：編號`rid`(自動編號)、名稱`r_name`(新增時判斷是否重複)
     3. 供應商`supplier`：編號`sid`(自動編號)、名稱`s_name`、聯絡人`contact`、電話`tel`、住址`address`(新增時判斷是否重複)

    ![alt text](image.png)
## [v4] - 2025-03-10
- 這是一個練習，需要自行新增名為user的資料表，內有四個varchar欄位，分別為id、passowrd、email、phone
- 這個版本優化了前後端的寫法，是Week4的上課內容
- php class內部method功能若有大量重複部分，可獨立出private function，以便內部呼叫
- 簡單的if-else可以使用另一種寫法 ?expression-true : expression-flase