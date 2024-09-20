<html>
<head>
  <title>This or That</title>

  <style>
    body {
      display: flex; 
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .input-container {
      margin-bottom: 20px;
    }
  </style>
</head>
  
<body>

  <h1>This or That</h1>

  <?php 
    $file = "votes.txt";

    if (file_exists ($file)) {
      $votes = json_decode (file_get_contents ($file), true);
    } else {
      $votes = [
        'question-1-option-1' => 0,
        'question-1-option-2' => 0,
        'question-2-option-1' => 0,
        'question-2-option-2' => 0,
        'question-3-option-1' => 0,
        'question-3-option-2' => 0,
        'question-4-option-1' => 0,
        'question-4-option-2' => 0,
        'question-5-option-1' => 0,
        'question-5-option-2' => 0,
      ];
    }

    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
      if (isset ($_POST ['question-1'])) {
        $option = $_POST ['question-1'];
        $votes ["question-1-$option"] += 1;
      } 
      
      if (isset ($_POST ["question-2"])) {
        $option = $_POST ["question-2"];
        $votes ["question-2-$option"] += 1;
      } 

      if (isset ($_POST ["question-3"])) {
        $option = $_POST ["question-3"];
        $votes ["question-3-$option"] += 1;
      }

      if (isset ($_POST ["question-4"])) {
        $option = $_POST ["question-4"];
        $votes ["question-4-$option"] += 1;
      }

      if (isset ($_POST ["question-5"])) {
        $option = $_POST ["question-5"];
        $votes ["question-5-$option"] += 1;
      }

      file_put_contents ($file, json_encode ($votes));
    }
  ?>

  <form method = "POST">
    <div class = "input-container">
      <label> 1. Is cereal a soup </label>
      <button name = "question-1" value = "option-1"> Yes </button>
      <button name = "question-1" value = "option-2"> No </button>

      <p>
        Yes: <?php echo $votes['question-1-option-1']; ?>
        No: <?php echo $votes['question-1-option-2']; ?>
      </p>   
    </div>

    <div class = "input-container">
      <label> 2. Pepsi or Coke </label>
      <button name = "question-2" value = "option-1"> Pepsi </button>
      <button name = "question-2" value = "option-2"> Coke </button>

      <p>
        Pepsi: <?php echo $votes['question-2-option-1']; ?>
        Coke: <?php echo $votes['question-2-option-2']; ?>
      </p> 
    </div>

    <div class = "input-container">
      <label> 3. Marvel or DC </label>
      <button name = "question-3" value = "option-1"> Marvel </button>
      <button name = "question-3" value = "option-2"> DC </button>

      <p>
        Marvel: <?php echo $votes['question-3-option-1']; ?>
        DC: <?php echo $votes['question-3-option-2']; ?>
      </p> 
    </div>

    <div class = "input-container">
      <label> 4. Is pinapple on pizza good </label>
      <button name = "question-4" value = "option-1"> Yes </button>
      <button name = "question-4" value = "option-2"> No </button>

      <p>
        Yes: <?php echo $votes['question-4-option-1']; ?>
        No: <?php echo $votes['question-4-option-2']; ?>
      </p> 
    </div>

    <div class = "input-container">
      <label> 5. Iphone or Android </label>
      <button name = "question-5" value = "option-1"> Iphone </button>
      <button name = "question-5" value = "option-2"> Android </button>  

      <p>
        Iphone: <?php echo $votes['question-5-option-1']; ?>
        Android: <?php echo $votes['question-5-option-2']; ?>
      </p> 
    </div>
  </form>

</body>
</html>
