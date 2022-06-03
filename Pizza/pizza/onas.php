<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pizzeria Sorento</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="icon shortcut" type="image/png" href="./img/iconka.png">
  </head>
  <body>
    <div id="tlo" class="tlo cover">

    </div>
    <header>
      <nav>
        <div class="logo">
          <img src="./img/logo.png" alt="logo sorento"/>
          <div id="burger-btn" class="cover-big">
                  <div id="h-icon" class="close">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
          </div>
        </div>
        <div id="menu" class="menu cover">
          <a href="home"> <i class="icon-home"></i> </a>
          <a href="menu">MENU</a>
          <a href="zamów-online">ZAMÓW ONLINE</a>
          <a href="">O NAS</a>
          <a href="kontakt">KONTAKT</a>
          <a href="koszyk"> <i class="icon-basket"></i> </a>
        </div>
        <div class="cover">

        </div>
      </nav>
    </header>
    <main>
      <section class="kontakt-sec">
        <div class="naglowek"> <p>O nas</p> </div>
        <div class="kontakt-box">
          <div class="kontakt-elem" style="text-align: left; font-weight: bold;width: 98%; margin: 7vh 1%;">
            <p>🍕 Nasza pizzeria jest najlepszą w Murowanej Goślinie według ocen klientów.</p>
            <p>🍕 Tworzymy pizzę z najwyższej jakości naturalnych składników.</p>
            <p>🍕 Możesz nas odwiedzić 7 dni w tygodniu.</p>
            <p>🍕 Obsługujemy dowóz w promieniu 20km od Murowanej Gośliny.</p>
            <p>🍕 Pizzę zamówisz u nas telefonicznie i internetowo.</p>
            <p>🍕 Skolimy się u zawodowców takich jak Michel Moran.</p>
          </div>
          <div class="kontakt-elem">
            <img src="./img/onas.jpg" alt="pizza" style="width: 98%; margin: 1%; border-radius: 2%;">
          </div>
        </div>
      </section>
    </main>
    <script>
        document.getElementById("burger-btn").onclick = () =>
        {
            if( document.getElementById("h-icon").classList.contains('close') )
                {
                    document.getElementById("h-icon").classList.add('open');
                    document.getElementById("menu").classList.remove('cover');
                    document.getElementById("tlo").classList.remove('cover');
                    document.getElementById("h-icon").classList.remove('close');
                }
            else
                {
                  document.getElementById("h-icon").classList.remove('open');
                  document.getElementById("menu").classList.add('cover');
                  document.getElementById("tlo").classList.add('cover');
                  document.getElementById("h-icon").classList.add('close');
                }
        }
    </script>
  </body>
</html>
