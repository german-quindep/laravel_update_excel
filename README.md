<h1>laravel_update_excel</h1>

<h5>Subida de datos masivos de productos a la base de datos en laravel y mysql.</h5>
<br>
<p>Se sube un archivo en formato excel, tiene validacion solo acepta en formato:
  <li>xlsx</li>
</p> 
<br>
<p>Una vez subido se verificara si ya existe el producto en el caso de que exista se actualizara el stock, 
  caso contrario si no existe y es producto nuevo registrarlo en una nueva tabla llamada log Produtcs.</p>
  <br>
<p><b>Librerias a utilizar: </b></p>
<li>composer require maatwebsite/excel:2.1.*</li>
<li>Laravel version 5.4.*</li>
<br>
<p>Tambien se puede enviar correo electronico notificando al usuario que tipo de registro masivo se realizo 
  en la bd de la tabla log Products.</p>


