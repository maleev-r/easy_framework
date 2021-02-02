<?php if (\app\app::$error): ?>
    <pre>
    <?php print_r(\app\app::$error); ?>
    </pre>
<?php endif; ?>