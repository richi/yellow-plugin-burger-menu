<?php $pages = $yellow->pages->top() ?>
<?php $pagesMultiLanguage = $yellow->pages->multi($yellow->page->location, false, true) ?>
<?php $yellow->page->setLastModified($pages->getModified()) ?>
<?php $yellow->page->setLastModified($pagesMultiLanguage->getModified()) ?>

<?php $yellow->snippet("navigation") ?>

<nav class="burger-navigation">

<div class="burger-navigation-main">
<ul>
<?php foreach($pages as $page): ?>
<li><a<?php echo $page->isActive() ? " class=\"active\"" : "" ?> href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("titleNavigation") ?></a></li>
<?php endforeach ?>

<?php if(count($pagesMultiLanguage) > 1): ?>
<li>
<?php foreach($pagesMultiLanguage as $page): ?>
<?php if ($page->get("language") != $yellow->page->get("language")): ?>
<a href="<?php echo $page->getLocation().$yellow->toolbox->getLocationArgs() ?>">
<?php echo "<i class='language-".$page->get("language")."'> </i>" ?> </a>
<?php endif ?>
<?php endforeach ?>
</li>
<?php endif ?>
</ul>
</div>

<?php if($yellow->page->isPage("sidebar")): ?>
<div class="burger-navigation-content">
<?php $page = $yellow->page->getPage("sidebar") ?>
<?php $page->setPage("main", $yellow->page) ?>
<?php $yellow->page->setLastModified($page->getModified()) ?>
<?php echo $page->getContent() ?>
</div>
<?php endif ?>

</nav>
