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
<html lang="<?php echo $this->language; ?>">

<head>
    <jdoc:include type="head" />

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '639762646486969');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=639762646486969&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
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