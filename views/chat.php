<?php $v->layout("_Template"); ?>
<div class="mt-3">
    <a href="<?= site() ?>" class="logoff text-right mr-2 btn btn-danger">sair</a>
    Olá, <?= $user ?>
</div>

<div id="message_loader" class="mt-3"></div>
 
<form method="post" id="form" class="w-100 fixed-bottom m-3" action="<?= site() ?>/sendMessage">
    <input type="text" id="send_message" class="chat_input" placeholder="Digite a sua mensagem"><input type="submit" value="Enviar" width="10%" class="btn-sm btn-success chat_btn">
</form>


<?php $v->start("scripts"); ?>
<script src="<?= asset('js/pusher.js') ?>"></script>
<script src="<?= asset('js/Chat.js') ?>"></script>
<?php $v->end(); ?>