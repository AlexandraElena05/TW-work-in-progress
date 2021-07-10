function orderRecipes(str) {
   if (str == "") {
    document.getElementById("recipesPlace").innerHTML = "";
    return;
    } else {
    var xmlhttp = new XMLHttpRequest();
     console.log(str);
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("recipesPlace").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getRecipes.php?q="+str,true);
    xmlhttp.send();
  }
}

function orderRecipesNoUserLogged(str) {
    if (str == "") {
     document.getElementById("recipesPlace").innerHTML = "";
     return;
     } else {
     var xmlhttp = new XMLHttpRequest();
      console.log(str);
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         document.getElementById("recipesPlace").innerHTML = this.responseText;
       }
     };
     xmlhttp.open("GET","getRecipesOrdered.php?q="+str,true);
     xmlhttp.send();
   }
}
