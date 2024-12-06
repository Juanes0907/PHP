<html>
<body>
<?php
$comment = $_POST["comentario"];
$genero = $_POST["gender"];
$arrayGenero = array("Hombre", "Mujer", "No específico");

echo "Su nombre es " , $_POST["name"];
echo " ,tu correo electrónico es " , $_POST["correo"];
echo " ,usted es ", $_POST["gender"];
echo " ,su número de teléfono es ", $_POST["telefono"];
echo " ,su tipo de sangre es ", $_POST["sangre"];
echo " , y naciste en ", $_POST["fecha"];

if ($_POST["name"] == "") {
    echo "Ingrese información por favor" , "<br>";
}else{
    echo "<br>" ,"Gracias por tus respuestas";
}

?>

</body>
</html>