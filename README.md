# laravel_update_excel
Subida de datos masivos de productos a la base de datos en laravel y mysql.
Se sube un archivo en formato excel, tiene validacion solo acepta en formato xslx o xls, una vez subido se verificara si ya existe el producto 
en el caso de que exista se actualizara el stock, caso contrario si no existe y es producto nuevo registrarlo en una nueva tabla llamada log Produtcs.
Librerias a utilizar
composer require maatwebsite/excel:2.1.*
Laravel version 5.4.*
