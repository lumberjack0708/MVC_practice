import startPage from './startPage.js';
import doSelect from './doSelect.js';
import showInsertPage from './showInsertPage.js';
import {showUpdateList, showDeleteList} from './showList.js';

window.onload = function(){
    document.getElementById("root").innerHTML = startPage();
    document.getElementById("insert").onclick = function(){
        showInsertPage();
    };
    document.getElementById("update").onclick = function(){
        showUpdateList();
    };
    document.getElementById("delete").onclick = function(){
        showDeleteList();
    };
    document.getElementById("select").onclick = function(){
        doSelect();
    };
};
