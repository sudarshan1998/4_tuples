<?php
include "connect.php";
 ?>

<!DOCTYPE HTML>
<html>
<head>
<style>
#div1 {
    width: 350px;
    height: 150px;
    padding: 10px;
    border: 1px solid #aaaaaa;

}
#div2{
  width: 350px;
  height: 150px;
  padding: 10px;
  border: 1px solid #aaaaaa;

}
#div3{
  width: 350px;
  height: 350px;
  padding-left : 20px;
  border: 1px solid #aaaaaa;
  background-color: blue;


}
#fuck1{
  width: auto;
  height: auto;
  padding-left : 20px;
  border: 1px solid #aaaaaa;
  background-color: white;


}
#fuck2{
  width: auto;
  height: auto;
  padding-left : 20px;
  border: 1px solid #aaaaaa;
  background-color: yellow;


}

</style>



<script>

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.clearData();
    ev.dataTransfer.setData("Text", ev.target.id);
    //console.log(ev.target.id);
}



function drop(ev,el) {
  ev.preventDefault();
      var data = ev.dataTransfer.getData("Text");
console.log(document.getElementById(data));
el.appendChild(document.getElementById(data));

}

function getData(){
    var flag = true;
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');
    var data1 = div1.textContent;
    var data2 = div2.textContent;
//  console.log("data is ",data1);
  if((data1===""||data1===null)&&(data2 ===""||data2===null)){
    flag = false;
  } else{
      var testField = document.getElementById('test');
      var testField2 = document.getElementById('test1');
      testField.value = data1;
      testField2.value = data2;
  }
  return flag;
}

</script>
</head>
<body>
<form action="fetch_data.php" method = "post" id="myform" onsubmit="return getData();">
<div id = "div1" name="div1" ondrop="drop(event,this)" ondragover="allowDrop(event)"></div><br>
<div id = "div2" name = "div2" ondrop = "drop(event,this)" ondragover  = "allowDrop(event)"></div>
</div>
<input type="hidden" name="test" id="test" ondragover  = "allowDrop(event)">
<input type="hidden" name = "test1" id = "test1">
<input type = 'submit' name="submit" value="submit">
</form>

<?php
//echo  '<div3 id = div3 draggable = "true" ondrop="drop(event)" ondragover="allowDrop(event)">';

$table1='dragdrop';
  echo  '<div id ="div3" ondrop="drop(event,this)" ondragover  = " allowDrop(event)">';
    $sql = "SELECT * FROM $table1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

          echo  '<p id="drag1" class = "icon" ondragstart="drag(event)" draggable="true" >'.$row['ans1']; '</p>';
            echo '<p id="drag2" class = "icon"  ondragstart="drag(event)" draggable="true">'.$row['ans3'];'</p>';
            echo '<p id="drag3" class = "icon" ondragstart="drag(event)" draggable="true">'.$row['ans4'];'</p>';
            echo '<p id="drag4" class = "icon"  ondragstart="drag(event)" draggable="true">'.$row['ans5'];'</p>';
            echo '<p id="drag5"class = "icon" ondragstart="drag(event)" draggable="true">'.$row['ans6'];'</p>';
            echo'<p id="drag6" class = "icon" ondragstart="drag(event)" draggable="true">'.$row['ans7'];'</p>';
            echo '<p id="drag7" class = "icon" ondragstart="drag(event)" draggable="true">'.$row['ans8'];'</p>';
          echo'<p id="drag8" class = "icon" ondragstart="drag(event)" draggable="true">'.$row['ans9'];'</p>';



        }
      }

      echo "</div>";
?>

</body>
</html>
