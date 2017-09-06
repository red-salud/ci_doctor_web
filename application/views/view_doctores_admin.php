<html>
 <head>
 <title><?=$page_title?></title>
 </head>
 <body>
 <form name="tabla" action="" method="POST">
 <table border="solid">
 <thead>
 <tr>
 <th></th>
 <th>Nombre</th>
 <th>Apellido</th>
 <th>Email</th>
 <th>Password</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($doctores as $u):?>
 
 <tr>
 <td><input type="radio" name="editar" value="<?=$u->id_Doc?>"/></td>
 <td><?=$u->nom_Doc?></td>
 <td><?=$u->ape_Doc?></td>
 <td><?=$u->email_Doc?></td>
 <td><?=$u->pass_Doc?></td>
 </tr>
 
 <?php endforeach;?>
 </tbody>
 </table>
 <input type="submit" value="Editar" />
 </form>
 </body>
</html>