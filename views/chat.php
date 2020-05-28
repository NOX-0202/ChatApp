<?php $v->layout("_Template"); ?>
<div class="row">
  <div class="col-12 col-sm-8">
    <div class="mt-3">
        <a href="<?= site() ?>" class="logoff text-right mr-2 btn btn-danger">sair</a>
        Olá, <span id="username"><?= $user ?></span>
    </div>
  </div>
  <!-- Force next columns to break to new line at md breakpoint and up -->
  <div class="w-100 d-none d-md-block"></div>
    <div class="col-10">
    <div id="message_loader" class="mt-3 rounded border"></div>
    
    <form method="post" id="form" class="fixed-bottom m-3 " action="<?= site() ?>/sendMessage">
        <input type="text" id="send_message" class="chat_input" placeholder="Digite a sua mensagem"><input type="submit" value="Enviar" width="10%" class="btn-sm btn-success chat_btn">
    </form>
  </div>
  <div class="col-2">
        <div class="online_users mt-2">
            <h3>Online users</h3>
            <ul id="list_users"></ul>
        </div>
  </div>
</div>


<?php $v->start("scripts"); ?>
<script src="<?= asset('js/pusher.js') ?>"></script>
<script src="<?= asset('js/Chat.js') ?>"></script>
<?php $v->end(); ?>