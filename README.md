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


<h3>Indicaciones previas para el buen funcionamiento del proyecto</h3>
 <p>Lo primero que se debe hacer es ejecutar las migraciones de laravel para que se suban las tablas, luego
 de ello ir a la base de datos y buscar la tabla products y ejecutar la siguiente sentencia</p>
 <br>
 INSERT INTO `products` (`id`, `secuencial`, `codigo`, `bodega`, `cantidad`, `created_at`, `updated_at`) VALUES (NULL, 'Samsung Galaxy Pro Max', '788921', '255', '23', NULL, NULL), (NULL, 'Samsung Galaxy Pro S9', '788922', '256', '11', NULL, NULL), (NULL, 'Samsung Galaxy S20', '788923', '255', '8', NULL, NULL), (NULL, 'Samsung Galaxy P30', '788924', '256', '7', NULL, NULL), (NULL, 'Huawewi P30 Lite', '788925', '255', '6', NULL, NULL), (NULL, 'Huawewi Smarth P40', '788926', '256', '5', NULL, NULL), (NULL, 'Iphone Touch Pro Max 20', '788927', '255', '10', NULL, NULL), (NULL, 'Pro Lite Huawei', '788821', '255', '23', NULL, NULL);
  <br><br>
  <p>Par el envio de correo se debe configurar el archivo env y busar el apartado que diga mail_drive, mail_host 
  e ir configurando segun el correo que se vaya a utilizar. Una vez configurado esa parte revisar el archivo 
  SendEmailController para configurar el envio de correo se adjunta las lineas a modificar</p>
  <br><br>
  <p>Solo se modifica el apartado que tiene este emojis  ➔ una vez modificado borrar el emojis</p>
  <p>Mail::send('emails.welcome', compact("productLog"), function ($message) { <br>
                $message->from('➔tuemail', 'Email de Prueba');<br>
                $message->to('➔tuemail')->subject('Reporte del día');<br>
            });</p>
            <br><br>
            <p><b>Nota: </b> Para este caso se enviara un correo a nosotros mismo</p>
  <p>Una vez insertados los productos y configurado el mail ahora si a correr la aplicacion y probarla</p>
  
 
