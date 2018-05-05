<?php //require 'db/connection.php'; ?>

<?php 
$conn = new PDO('mysql:host=localhost:3308;dbname=teste', 'root', 'root');
$users = $conn->query('SELECT * from users');
$users->setFetchMode(PDO::FETCH_INTO, new stdClass);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="content">
	<div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span>Lista de Usuários</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span><a href="new.php" class="btn btn-primary">Novo Usuário</a></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                    	<thead>
                    		<tr>
                    			<th>Nome</th>
                    			<th>Email</th>
                    			<th>Cores</th>
                    			<th>Ação</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php foreach ($users as $user) { ?>
                            	<tr>
                            		<td><?= $user->name; ?></td>
                            		<td><?= $user->email; ?></td>
                            		<td>
                            		<?php $user_colors = $conn->query("SELECT * from user_color where user_id ='{$user->id}'"); ?>
                                    <?php $user_colors->setFetchMode(PDO::FETCH_INTO, new stdClass); ?>
                                    <?php foreach ($user_colors as $user_color) { ?>
                                    	<?php $colors = $conn->query("SELECT * from colors where id ='{$user_color->color_id}'"); ?>
                                    	<?php $colors->setFetchMode(PDO::FETCH_INTO, new stdClass); ?>
                                    	<?php foreach ($colors as $color) { ?>
                                    		<?= $color->name; ?>
                      					<?php } ?>
                            		<?php } ?>
                            		</td>
                            		<td><a href="/edit.php?id=<?= $user->id; ?>">Editar</a> - <a href="/remove.php?id=<?= $user->id; ?>">Excluir</a></td>
                            	</tr>
                            <?php } ?>
                    	</tbody>
                    </table>
             	</div>
            </div>
   		</div>
   	</div>
</div>
