
function clickTextTotal() {
  var inputTodoText = document.getElementById("inputTodoText");
  if (!inputTodoText.value.trim()) {
  ;
  } else {
    clickTextForForm();
    }
}

function clickTextForForm() {
  // 入力文字のスパンタグ出力
  var inputTodoText = document.createElement("span");
  var inputValue = document.getElementById("inputTodoText").value;
  const textPlus = '#' + inputValue;
  inputTodoText.innerText = textPlus;
  var outputText = document.getElementById("formArea");
  outputText.appendChild(inputTodoText);
  // 出力後にinputに対してフォーカスとクリア
  document.getElementById("inputTodoText").focus();
  var inputTodoText = document.getElementById("inputTodoText");
  inputTodoText.value = '';
  // hiddenを作成
  var inputHidden = document.createElement("input");
  inputHidden.setAttribute("name", "heading[]");
  inputHidden.setAttribute("type", "hidden");
  inputHidden.setAttribute("value", inputValue);
  var formArea = document.getElementById("formArea");
  formArea.appendChild(inputHidden);
}

function clickClear() {
  const formArea = document.getElementById("formArea");
  formArea.innerHTML ='';
}

// フォームのバリデーションアラート
$(document).ready(function () {
  if ($('.top-form-alert').length) {
   alert('Todoタグを選択するか入力フォームでTodo追加をしてください');
  } 
}); 

// function clickClear () {
//   cosole.log("test1");
//   var clear = document.getElementById("formArea");
//   cosole.log("test1", clear);
//   clear.innerText ="";
//   cosole.log("test1");
// }



// 参考：https://blog.ver001.com/javascript-textarea-selectionstartend/
// function addText()
// {
// 	document.getElementById('textarea1').value
// 		+= document.getElementById('inputTodoText').value;
// }
// function addText2()
// {
// 	document.getElementById('textarea1').value
// 		+= document.getElementsByClassName('btn-lg').value;
// }

// function tagClick1() {
//   addElement1();
//   clickBtn1();
// }

// function addElement1() {
//   var element = document.createElement("span");
//   element.innerText = "#家族と会う" 
//   var formArea = document.getElementById("formArea");
//   formArea.appendChild(element);
// } 

// function clickBtn1() {
//   document.form1.heading.value = "#家族と会う";
// }

// function tagClick2() {
//   addElement2();
//   clickBtn2();
// }

// function addElement2() {
//   var element = document.createElement("span");
//   element.innerText = "#買い物に行く" 
//   var formArea = document.getElementById("formArea");
//   formArea.appendChild(element);
// } 

// function clickBtn2() {
//   document.form1.heading.value = "#買い物に行く";
// }

// 参考:https://techacademy.jp/magazine/20732
// function addElement1() {
  // 要素を作成する
  // var element = document.createElement("span");
  // var element = document.classList.add("test");
  // element.innerText = "#家族と会う" 

  // 要素を追加する「親要素」を指定する。
  // var formArea = document.getElementById("formArea");
  // 要素を追加する
  // formArea.appendChild(element);
  // 次の要素を改行して追加するために br 要素を追加する
  // formArea.appendChild(document.createElement(""));  
// } 

// $(function(){
//   $(‘#koibito‘).on('click', function(){
//   $(‘#testinput‘).val(‘#家族と会う’);
//   });
// });

  // document.getElementById("btn-lg").onclick = function() {
  //   document.getElementById("textarea").innerHTML = "クリック変化";
  // };

// // 参考:https://itsakura.com/js-textbox
// function clickBtn4(){
// 	// 値を設定
// 	document.form1.text1.value = "#買い物に行く";
// }

// function clickBtn5(){
// 	document.form1.text1.value = ""; //クリア
// }


// $(function(){
//   $(‘#testbutton‘).click(function(){
//   $(‘#formArea p‘).prepend(‘<span>spansample</span>’);
//   });
// });

// $(function(){
//   $(‘#testbutton‘).on('click', function(){
//   $(‘#formArea p‘).prepend(‘<span>spansample</span>’);
//   });
// });

// $('#testbutton').click(function() {
//   $('#formArea p').prepend(‘<span>spansample</span>’);
// }

// $('#testbutton').on('click', function() {
//   $('#formArea p').prepend(‘<span>spansample</span>’);
// }



// 参考:https://qiita.com/KKKarin/items/ccb8ed361ab9acd1f9cf
//   var myfunc = document.getElementById("myfunc");
// myfunc.addEventListener("click", function() {
//   console.log("ほげほげ1");
// });

// myfunc.addEventListener("click", function() {
//   console.log("ほげほげ２");
// });

// 参考:https://develop.logical-studio.com/web/20191213-js-class-addeventlistener/
// var testjava = document.querySelectorAll(".testjava");
//   testjava.forEach(function(target) {
//   target.addEventListener('mouseenter', function() {
//      target.firstElementChild.style.display = 'block';
//   });
//   target.addEventListener('mouseleave', function() {
//      target.firstElementChild.style.display = 'none';
//   });
// });