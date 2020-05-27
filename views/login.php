<?php $v->layout("_Template"); ?>

    <div class="container-fluid center">
        <h1 class="mb-4">
            <span class="font-weight-bold" style="color: #25D366;">Chat</span>app <img src="<?= asset('img/logo.png') ?>" width="50px"/>
        </h1>
        <form method="post" class="d-flex flex-column" id="form" action="<?= site() . "/chat" ?>">
            <input type="text" id="username_user" class="mb-3 box-w-login" placeholder="Type your username" required> 
            <input type="submit" value="Enviar" class="btn-sm btn-success box-w-login">
        </form>
    </div>

<?php $v->start("scripts"); ?>
<script src="<?= asset('js/login.js') ?>"></script>
<?php $v->end(); ?>