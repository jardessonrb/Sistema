<!DOCTYPE html>
<html>
<head>
  <title>Teste</title>
</head>
<body>
<h1>Testando teclado</h1>
</body>
</html>

<script>

  window.addEventListener("keydown", checkKeyPress, false);

  function checkKeyPress(key){

    if(key.keyCode ==  "13"){

      alert("Deu certo");
    }

  }

</script>