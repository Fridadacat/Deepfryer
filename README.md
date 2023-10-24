Entpacke alle dateien in deinen htdocs folder und passe den dateipfad in fry.php an
 

Installieren sie XAMPP: https://www.apachefriends.org/de/download.html
Klicken sie in der Sparte "Apache" auf config und wählen sie php.ini
Suchen sie nach "gd" und ändern sie ";extension=gd" zu "extension=gd"


Installieren sie COMPOSER: https://getcomposer.org/download/
Composer benötigt 7zip und git um zu funktionieren. Wenn sie dies noch nicht heruntergeladen haben, können sie dies hier:
https://www.7-zip.org/download.html

öffnen sie ihr cmd. und schauen sie, dass sie ihren htdocs folder unter C:/xampp/htdocs haben.
geben sie nun folgende 2 commands ein:

cd C:\xampp\htdocs
composer require mirazmac/php-deep-fry

Die library sollte nun eingebunden sein. Öffnen sie nun http://localhost/main.php in ihrem browser.
