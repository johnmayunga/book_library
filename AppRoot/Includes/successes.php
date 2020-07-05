<?php if(count($successes) > 0) :?>
<div class="seccesses">
    <?php foreach ($successes as $success): ?>
        <p class="message-span"><?php echo $success; ?></p>
    <?php endforeach ?>
</div>
<?php endif; ?>