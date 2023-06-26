pliki:

folder pizza -> zawiera pliki strony (należy go umieścić w folderze xampp/htdocs)
pliki w folderze:
 - pizza/css -> zawiera pliki css dla stron
 - pizza/font -> zawiera fonty potrzebne do działania strony
 - pizza/img -> zdjęcia dla stron
 --- pizza/img/pizza -> zdjęcia produktów przesłane przez użytkownika
 - pizza/.htaccess, pizza/config.json -> plik dodatkowe do działania strony
 - pizza/connect.php -> plik konfiguracji połączenia z bazą danych
 - pizza/delete.php, pizza/dodajzam.php, pizza/zamow.php -> pliki php obsługi strony
 - pizza/index.php -> plik strony głównej
 - pizza/menu.php, pizza/zamowienia.php, pizza/onas.php, pizza/kontakt.php, pizza/koszyk.php -> pliki podstron
 - pizza/admin -> pliki panelu administratora
 ---pizza/admin/css, pizza/admin/style.css, pizza/admin/style1.css -> pliki css dla panelu administratora
 ---pizza/admin/index.php -> strona logowania do panelu
 ---pizza/admin/.htaccess,config.json -> plik dodatkowe do działania stron
 ---pizza/admin/font -> zawiera fonty potrzebne do działania stron
 ---pizza/admin/panel.php,produkty.php,archiwum.php,ustawienia.php,pro-add-pan.php,pro-del-pan.php,zam-add-pan.php,zam-del-pan.php -> pliki podstron
 ---pizza/admin/haslo.php,login.php,logout.php,pro-add.php,pro-del.php,pro-edit.php,zam-add.php,zam-del.php,zam-edit.php -> pliki php obsługi strony

pizza.sql -> plik sql do inportu bazy danych (zawiera bazę danych pizza)(!zawiera polecenie create database if not exist)

o-projekcie.txt -> obecny plik z opisem plików


Panel administratora - logowanie:
1. Dodaj /admin za adresem strony.
2. W pole login wpisz "admin", w pole hasło wpisz "pizza".
3. Zostaniesz zalogowany do panelu administratora


Autor strony: Wojciech Gunia
Strona testowana na PC oraz urządzeniach mobilnych Huawei P30 i iPhone 11. 
