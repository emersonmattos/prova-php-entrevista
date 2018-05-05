<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php 
$conn = new PDO('mysql:host=localhost:3308;dbname=teste', 'root', 'root');
$colors = $conn->query('SELECT * from colors');
$colors->setFetchMode(PDO::FETCH_INTO, new stdClass);
?>

<div class="row">
	<div class="col-md-offset-3 col-md-4">
    <form action="/save.php" method="post">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
      </div>
      <?php foreach ($colors as $color) { ?>
          <div class="form-check">
            <input type="checkbox" name="colors[]" value="<?= $color->id; ?>" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1"><?= $color->name; ?></label>
          </div>
      <?php } ?>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    </div>
</div>