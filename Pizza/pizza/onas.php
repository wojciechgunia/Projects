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
          <a href="zam贸w-online">ZAM脫W ONLINE</a>
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
            <p>馃崟 Nasza pizzeria jest najlepsz膮 w Murowanej Go艣linie wed艂ug ocen klient贸w.</p>
            <p>馃崟 Tworzymy pizz臋 z najwy偶szej jako艣ci naturalnych sk艂adnik贸w.</p>
            <p>馃崟 Mo偶esz nas odwiedzi膰 7 dni w tygodniu.</p>
            <p>馃崟 Obs艂ugujemy dow贸z w promieniu 20km od Murowanej Go艣liny.</p>
            <p>馃崟 Pizz臋 zam贸wisz u nas telefonicznie i internetowo.</p>
            <p>馃崟 Skolimy si臋 u zawodowc贸w takich jak Michel Moran.</p>
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
