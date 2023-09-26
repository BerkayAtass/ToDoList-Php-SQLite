//--------------------------------- Switch ------------------------------------------------

var x = document.getElementById('ToDoList');
var y = document.getElementById('AddNewToDo');
var z = document.getElementById('btn');
function todosPage(){
   x.style.left = "27px";
   y.style.right = "-350px";
   z.style.left = "0px";
}
function AddTodoPage(){
  x.style.left = "-350px";
  y.style.right = "25px";
  z.style.left = "171px";
}

//--------------------------------- TO DO FONKSIYONLARI ------------------------------------------------

const todoList = document.querySelector('.to-do-list');
const searchInput = document.querySelector('#newToDoTitle');


let isEditing = false;

runEvents();

function runEvents(){
   
    todoList.addEventListener("click", function (e) {
        if (e.target.className === "savebutton" && e.target.textContent === "Save") {
            isEditing = true;
        }
    });
    todoList.addEventListener("click", editTodoUI);
    todoList.addEventListener("click", editSaveTodoUI);
    searchInput.addEventListener("keyup", searchTodo);
}



//------------------------------------------- To Do Delete----------------------------------------

function deleteTodo(TodoId){

  const id = TodoId;
  
  $.post("delete.php", {
      id: id
  }, (data) => {
      if (data) {
          // Hide the corresponding <li> element
          $('#'+id).parent().parent().hide(600);
      }
  });
  
  console.log("ok");
}


//------------------------------------------- To Do Edit----------------------------------------

function editTodoUI(e){
  //console.log("edit calisti");
  if(e.target.className == "editbutton"){
      //console.log("edit if calisti");
      //console.log(e.target.parentElement.parentElement.querySelector('strong'));
      const div = e.target.parentElement.parentElement.parentElement.querySelector('div');
      const strong = e.target.parentElement.parentElement.querySelector('strong');
      const p = e.target.parentElement.parentElement.querySelector('p');
      const button = e.target;
      //console.log(div);
      //console.log(strong);
      //console.log(p);
      //console.log(button);
      oldTodo =  {titletext: strong.textContent, infotext: p.textContent};
      
      const inputEditTitle = document.createElement('input');
      inputEditTitle.type = "text";
      inputEditTitle.className = "editTitle-box";
      inputEditTitle.value = strong.textContent;
      //console.log(inputEditTitle.value);

      const inputEditInfo = document.createElement('textarea');
      inputEditInfo.type = "text";
      inputEditInfo.className = "editInfo-box";
      inputEditInfo.value = p.textContent;
      //console.log(inputEditInfo.value);

      div.insertBefore(inputEditTitle,strong);
      div.removeChild(strong);

      div.insertBefore(inputEditInfo,p);
      div.removeChild(p);
      
      
      console.log(e.target.id);
      //isEditing = true;
      button.textContent = "Save";
      button.className = "savebutton";

  }
}
//------------------------------------------- To Do Edit Save----------------------------------------

function editSaveTodoUI(e) {
  if (isEditing && e.target.className === "savebutton") {
      const div = e.target.parentElement.parentElement.parentElement.querySelector('div');
      const inputEditTitle = div.querySelector('.editTitle-box');
      const inputEditInfo = div.querySelector('.editInfo-box');
      const strong = document.createElement('strong');
      const p = document.createElement('p');


      strong.textContent = inputEditTitle.value;
      //strong.textContent = "Burayi goruyor";
      p.textContent = inputEditInfo.value;

      div.insertBefore(strong, inputEditTitle);
      div.insertBefore(p, inputEditInfo);

      div.removeChild(inputEditTitle);
      div.removeChild(inputEditInfo);

      //console.log(e.target.id);
      //console.log(strong.textContent);
      //console.log(p.textContent);


      $.post("edit.php", {
        id: e.target.id,
        title: strong.textContent,
        info: p.textContent
        }, function (data) {
        //console.log(data);
        });

      //console.log(e.target.id);

      e.target.textContent = "Edit";
      e.target.className = "editbutton";
      isEditing = false;


     
  }
}


//------------------------------------------- To Do Search----------------------------------------

function searchTodo(e){

  const filterValue = e.target.value.toLocaleLowerCase().trim();
  const listValues = document.querySelectorAll('.list');
  //console.log(filterValue);
  console.log(listValues);

  listValues.forEach(function(todo){
      //console.log(todo.textContent);
      //text contentin sonunda EditDelete yaziyordu her seferinde bu kisimlar localstorege oldugu icin silme islemini yapamiyordu.
      if(todo.textContent.replace("EditDelete", "").toLocaleLowerCase().trim().includes(filterValue)){
          todo.setAttribute("style", "display : block");
      }else{
          todo.setAttribute("style", "display : none !important");
      }
  });
}
