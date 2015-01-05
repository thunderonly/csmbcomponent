<?php defined('_JEXEC') or die;?>
<?php
$app = JFactory::getApplication();
$menu = $app->getMenu()->getActive();
$pageclass = '';

if (is_object($menu))
    $pageclass = $menu->params->get('pageclass_sfx');
$titleMenu = $menu->params->get('menu-anchor_title');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
</head>
<body class="body<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
<div id="cadre_exterieur">
    <div id="logo"></div>
    <div id="menu_principal"><jdoc:include type="modules" name="mainMenu" style="xhtml" /></div>
    <div id="cadre_principal">
        <div id="cadre_gauche">
            <div id="menu_secondaire"><jdoc:include type="modules" name="subMenu" style="xhtml" /></div>
            <div id="actualites" class="actualites<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>"><jdoc:include type="modules" name="news" style="xhtml" /></div>
        </div>
        <div id="cadre_central">
            <!--<div class="titre_cadre_central<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
                <h1><?php echo $titleMenu; ?></h1>
            </div>-->
            <jdoc:include type="component" style="xhtml" />
        </div>
        <div id="cadre_droite">
            <div id="sous-actualites" class="actualites<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
                <jdoc:include type="modules" name="subnews" style="xhtml" />
            </div>
        </div>
    </div>
    <div class="clr"></div>
    <div id="pied_de_page"><jdoc:include type="modules" name="footer" style="xhtml" /></div>
</div>

</body>
</html>
