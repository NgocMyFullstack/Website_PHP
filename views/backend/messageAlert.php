<?php

use App\Libraries\MessageArt;
?>
<?php if (MessageArt::has_flash('message')) : ?>
    <?php $message = MessageArt::get_flash('message'); ?>
    <div class="alert alert-<?= $message['type']; ?> alert-dismissible fade show" role="alert">
        <strong>Thông Báo!</strong> <?= $message['msg']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>