<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
Login de usuarios con el framework codeIgniter
 
 
<!--mostramos los errores del formulario, si los hay-->
<?php echo validation_errors(); ?>
<?php echo form_open('nueva_sesion') ?></pre>
<table>
<tbody>
<tr>
<td>Email de usuario:</td>
<td><input type="text" name="email" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pass" /></td>
</tr>
<tr>
<td></td>
<td><input title="Iniciar sesión" type="submit" value="Iniciar sesión" /></td>
</tr>
</tbody>
</table>
<pre>
<!--?php echo form_close() ?-->