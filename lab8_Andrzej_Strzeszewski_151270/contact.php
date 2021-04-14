<?php
  include('cfg.php');
  function PokazKontakt(){
    $wynik = '
    <div>
      <h1 class="heading">Formularz Kontaktowy</h1>
      <div>
        <form method="post" name="LoginForm" entcype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
          <table>
            <tr><td class="log4_t">[Tytuł]</td><td><input type="text" name="temat"/></td></tr>
            <tr><td class="log4_t">[Treść]</td><td><textarea rows="20" cols="50" name="tresc" ></textarea></td></tr>
            <tr><td class="log4_t">[Email]</td><td><input type="text" name="email"/></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" name="send" value="wyślij" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" name="remind" value="Przyminij hasło" /></td></tr>
          </table>
        </form>
      </div>
    </div>
    ';
    echo $wynik;
  }

  function WyslijMailaKontakt($odbiorca) {
    if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
      echo 'nie_wupelniles_pola';
      echo PokazKontakt(); 
    }
    else
    {
      $mail['subject'] = $_POST['temat'];
      $mail['body'] = $_POST['tresc'];
      $mail['sender'] = $_POST['email'];
      $mail['recipent'] = $odbiorca;

      $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
      $header .= "MIME-Version:1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Enconding";
      $header .= "X-Sender:<".$mail['sender'].">\n";
      $header .= "X-mailer:PRapwww mail 1.2\n";
      $header .= "X-Priority: \n";
      $header .= "Retur-Path<".$mail['sender'].">\n";
      mail($mail['recipent'],$mail['subject'],$mail['body'],$header);
      echo 'wiadomosc_wyslana';
    }
  }

  function PrzypomnijHaslo($odbiorca){
    $mail['recipent'] = $odbiorca;

    $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
    $header .= "Haslo do panelu admina: ".$pass;
    $header .= "Retur-Path<".$mail['sender'].">\n";
    mail($mail['recipent'],$mail['subject'],$mail['body'],$header);
    echo 'wyslano wiadomosc z haslem';

  }

  if(isset($_POST['send'])) WyslijMailaKontakt("mateuszsliwinski9@gmail.com");
  else if(isset($_POST['remind'])) PrzypomnijHaslo("mateuszsliwinski9@gmail.com");
  else PokazKontakt();
?>