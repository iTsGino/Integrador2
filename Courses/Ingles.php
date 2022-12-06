<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="accordion accordion-flush" id="accordionFlushExample">
<hr>
    
<?php
    for ($i=1; $i <=10 ; $i++) { 
?>
  <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Semana N°<?php echo $i; ?>
      </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <table class="table mt-2">
              <tbody>
              <?php
              include 'DetailWeek.php';
              ?>
              </tbody>
          </table>
      </div>
      </div>
  </div>
  <br>
<?php } ?>

</body>
</html>