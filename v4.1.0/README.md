# 練習：員工資料的CRUD
## [v4.1.0] - 2025-03-10
    - 新增auto incurent功能，主key id將會自動新增
    - 新增`產品資料`、`角色`、`供應商`三份資料表，對應欄位如下
        1. 產品資料：編號、名稱、成本、售價、數量
        2. 角色：編號(自動編號)、名稱(新增時判斷是否重複)
        3. 供應商：編號(自動編號)、名稱、聯絡人、電話、住址(新增時判斷是否重複)

    ![alt text](image.png)
## [v4] - 2025-03-10
    - 這是一個練習，需要自行新增名為user的資料表，內有四個varchar欄位，分別為id、passowrd、email、phone
    - 這個版本優化了前後端的寫法，是Week4的上課內容
    - php class內部method功能若有大量重複部分，可獨立出private function，以便內部呼叫
    - 簡單的if-else可以使用另一種寫法 ?expression-true : expression-flase