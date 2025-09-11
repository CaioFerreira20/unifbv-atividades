<?php include __DIR__ . '/header.php'; ?>

<h2>Contato</h2>
<div class="row">
      <div class="col s12">Onde nos localizamos</div>
      <div class="col s6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.9521003165883!2d-34.91778612499171!3d-8.10635999192264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1ef8ffea346f%3A0xe0a5692fda5e7080!2sUnidade%20Wyden!5e0!3m2!1spt-BR!2sbr!4v1757593648755!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      <div class="col s6">
        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Insira seu nome" id="first_name" type="text" class="validate">
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s6">
          <input Placeholder="Insira seu sobrenome"id=last_name type="text" class="validate">
          <label for="last_name">Sobrenome</label>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Insira seu email" id="Email" type="Email" class="validate">
          <label for="first_name">Email</label>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
        </div>
      </div>

      </div>
    </div>


<?php include __DIR__ . '/footer.php'; ?>
