<?php

defined('_JEXEC') or die;
/* =====================================================================
  Template: Patty saveurs
  Author:   guillaume@ordiservice.fr
  Version:  1.0
  Created:  September 2015
  Copyright:  Guillaume Singlan - (C) 2015 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  ===================================================================== */
$input = JFactory::getApplication()->input;
$id = $input->get('id');
//echo var_dump($id);
$article = JTable::getInstance("content");
$article->load($id);
//echo var_dump($article->item);
$published = JHtml::_('date', $article->created, JText::_('DATE_FORMAT_LC2'));
$alias = $article->get('alias');
$intro = substr(strip_tags(str_replace('&nbsp;', '', $article->get('introtext'))), 0, 97) . '...';
$metadesc = $article->get('metadesc');
//echo var_dump($article);
//echo var_dump($published);
$timage = htmlspecialchars(JURI::root() . 'images/articles/' . $alias . '/twitter.png');
//
$fimage = htmlspecialchars(JURI::root() . 'images/articles/' . $alias . '/facebook.png');
$gimage = htmlspecialchars(JURI::root() . 'images/articles/' . $alias . '/google.png');
$doc->addCustomTag('
    <meta name="twitter:title" content="' . $doc->title . '">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@metamonaco">
    <meta name="twitter:creator" content="Meta Monaco">
    <meta name="twitter:url" content="' . JURI::current() . '">
    <meta name="twitter:description" content="' . $metadesc . '">
    <meta name="twitter:image" content="' . $timage . '">
    <meta property="og:title" content="' . $doc->title . '"/>
    <meta property="og:type" content="article"/>
    <meta property="og:email" content="This email address is being protected from spambots. You need JavaScript enabled to view it."/>
    <meta property="og:url" content="' . JURI::current() . '"/>
    <meta property="og:image" content="' . $fimage . '"/>
    <meta property="og:site_name" content="Meta Monaco"/>
    <meta property="fb:app_id" content=""/>
    <meta property="og:article:published_time" content="' . $published . '"/>
    <meta property="og:description" content="' . $metadesc . '"/>
    <meta itemprop="name" content="' . $doc->title . '">
    <meta itemprop="description" content="' . $metadesc . '">
    <meta itemprop="image" content="' . $gimage . '">
    <meta itemprop="datePublished" content="' . $published . '">
    <meta property="article:published_time" content="' . $published . '" />
    <meta property="article:author" content="Meta Monaco" />
');
