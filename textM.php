<?php
session_start(); // On démarre la session AVANT toute chose
?>
<html>
<head>
<title>Text manager</title>
<link rel="stylesheet" href="https://unpkg.com/mustard-ui@latest/dist/css/mustard-ui.min.css">
<style>
    .highlight {
        background: yellow;
    }
</style>
</head>
<body>


<header style="height: 200px;">
<h1>Text manager</h1>
</header>
</style>
<?php
if (isset($_POST['textUrl'])) 
{
    $string = file_get_contents($_POST['textUrl']);
    $array = preg_split('/\s+/', $string);
    $_SESSION['a']=$array;
}

$array= $_SESSION['a'];
?>
<br>
<div class="row">
    <div class="col col-sm-5">
        <div class="panel">
            <div class="panel-body">
            <form action="textM.php" method="post">   
                <h2 class="panel-title">1. Get text</h2>
                    <input type="text" placeholder="Enter the poem url" name="textUrl" value="
<?php
if (isset($_POST['textUrl'])) 
{ echo $_POST['textUrl'];

    $_SESSION['b']= $_POST['textUrl'];

}
else if (isset($_POST['searchQuery'])) 
{
    echo $_SESSION['b'];
}
?>" > 


<br>
<button type="submit" name="action" value="fetch" class="button-primary align-center">Fetch text</button>

                </form>

                <form action="textM.php" method="post">   

<h2 class="panel-title">2. Find keywords</h2>
<input type="text" placeholder="Enter text to be highlighted" name="searchQuery" value="<?php
if (isset($_POST['searchQuery'])) 
{ echo $_POST['searchQuery'];
    echo $_POST['textUrl'];

}
?>" > <br>
<button type="submit" name="action" value="search" class="button-primary">Search text</button>



</form>

<form action="textM.php" method="post">   

<h2 class="panel-title">3. Check results</h2>
<?php
if (isset($_POST['searchQuery'])) {
$array1=preg_split('/\s+/',$_POST['searchQuery']);



echo "<div class='stepper'>";

foreach($array1 as $sQ) {


   echo "<div class='step'>";





echo $sQ;

foreach($array as $s) {
if($sQ == $s){
$array[key($array)]= "<span id='".$sQ."-".$i."' class= 'highlight' >$sQ</span>";


$i++;

}
next($array);


}
echo "<p class='step-number'>".$i."</p>";
echo "<p class='step-title'>";
echo"<span class='tag tag-blue'>Keyword: </span ><i>$sQ</i></p> 
</div> ";


for($o=1;$o<=$i; $o++){
echo "\n";
echo "<a href='#".$sQ."-".$o."' class='button-primary-outlined'>".$o."</a>";
}   
echo "</br>";

$i=1;
next($array1);


}


echo "</div> ";


}
?>" 

</form>
                            </div>
        </div>
    </div>

    <div class="col col-sm-7" style="padding-left: 25px;">
    <?php
foreach($array as $s) {
 

        echo $array[key($array)];
        echo "\n";

     
    next($array);

  
}



?>
    </div>
</div>
<?php
session_start(); // On démarre la session AVANT toute chose
?>
</body>
</html>

