# Deepfryer
Entpacken Sie alle Dateien in ihren Htdocs-Folder und passen Sie den Dateipfad in fry.php an.
 

Installieren sie XAMPP als Windowsuser: https://www.apachefriends.org/de/download.html
Platzieren sie den Htdocs-Folder unter "C:/xampp/".
Klicken sie in der Sparte "Apache" auf "config" und wählen sie "php.ini".
Suchen sie nach "gd" und ändern sie ";extension=gd" zu "extension=gd".


Installieren sie COMPOSER: https://getcomposer.org/download/
Composer benötigt 7zip um zu funktionieren. Wenn Sie dies noch nicht heruntergeladen haben, können Sie dies hier tun:
https://www.7-zip.org/download.html

Öffnen Sie ihr cmd und schauen Sie, dass Sie ihren Htdocs-Folder unter C:/xampp/htdocs haben.
Geben sie nun folgende 2 Commands ein:

cd C:\xampp\htdocs
composer require mirazmac/php-deep-fry

Die library sollte nun eingebunden sein. Öffnen Sie nun http://localhost/main.php in ihrem browser. Testen Sie den Fryer mit dem meme.jpg im htdocs folder
