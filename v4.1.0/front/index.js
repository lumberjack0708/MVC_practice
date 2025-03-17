import startPage from './startPage.js';
import employeeInfo from './employeeInfo.js';

window.onload = function(){
    document.getElementById("root").innerHTML = startPage();
    document.getElementById("employee").onclick = function(){
        employeeInfo();
    };
    document.getElementById("product").onclick = function(){
        productInfo();
    };
    document.getElementById("role").onclick = function(){
        roleInfo();
    };
    document.getElementById("supplier").onclick = function(){
        supplierInfo();
    };
};
