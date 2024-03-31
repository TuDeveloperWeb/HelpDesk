<?php
  require_once(__DIR__."/../../components/navigation.php");
?>

<nav class="side-menu bg-side">
    <ul class="side-menu-list">
        <?php foreach ($navigation as $item): ?>
            <?php if (in_array($item['requiredRole'], $arrRoles)): ?>
                <li class="grey with-sub">
                    <a href="<?= $item['url'] ?>">
                        <span class="<?= $item['icon'] ?>"></span>
                        <span class="lbl"><?= $item['label'] ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav><!--.side-menu-->
