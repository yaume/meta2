<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.meta
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
// Load template framework 
include_once JPATH_THEMES . '/' . $this->template . '/lib/head.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>>

<head>
    <jdoc:include type="head" />


</head>

<body class="<?php echo $active->alias,' ',$pageclass; ?>">
    <header>
        <section class="logo">
            <a href="http://www.meta.mc/">
                <img src="<?php echo $template?>/img/meta.png" alt="META MONACO - ART GALLERY" class="img-fluid">
            </a>
        </section>

        <jdoc:include type="modules" name="position-0" style='menu' />
        <section class="header-extra">
            <jdoc:include type="modules" name="position-1" />
        </section>

       
    </header>
    <main>
        <?php if ($messageQueue) {?>
        <jdoc:include type="message" />
        <?php }?>
        <jdoc:include type="modules" name="position-2" />
        <jdoc:include type="component" />
        <?php
if ($this->countModules('position-11') || $this->countModules('position-12') || $this->countModules('position-13')) {?>
        <section class="abovefooter">
            <section class="footer-left">
                <jdoc:include type="modules" name="position-11" />
            </section>
            <section class="footer-middle">
                <jdoc:include type="modules" name="position-12" />
            </section>
            <section class="footer-right">
                <jdoc:include type="modules" name="position-13" />
            </section>
        </section>
<?php }?>
    </main>

    <footer>

            <jdoc:include type="modules" name="position-14" />
            <jdoc:include type="modules" name="position-15" />

    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>