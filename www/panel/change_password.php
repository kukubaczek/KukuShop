<form action="zaloguj.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Podaj aktualne hasło</label>
    <input type="password" class="form-control" name="pass" id="exampleInputEmail1" placeholder="Podaj aktualne hasło">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nowe hasło</label>
    <input type="password" class="form-control" name="new_pass" id="exampleInputPassword1" placeholder="Podaj nowe hasło">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword2">Powtórz nowe hasło</label>
    <input type="password" class="form-control" name="new_pass_con" id="exampleInputPassword2" placeholder="Podaj nowe hasło">
  </div>
  <button type="submit" class="btn btn-default" style="float: right;">Zmień hasło</button>
</form>