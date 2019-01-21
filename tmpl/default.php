<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_loadarticle
 *
 * @copyright   Copyright (C) NPEU 2019.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;


$doc = JFactory::getDocument();

?>
<article>
<?php if ($params->get('pagetitle')): ?>
<h1><?php echo $doc->title; ?></h1>
<?php else: ?>
<h2><?php echo $params->get('title') ? $params->get('title') : $article->title; ?></h2>
<?php endif; ?>
<?php echo $article->introtext; ?>
<?php if ($article->fulltext != null): ?>
<p class="readmore">
<a href="<?php echo $article->alias; ?>"><?php echo JText::_('COM_CONTENT_READ_MORE'); ?></a>
</p>
<?php endif; ?>
</article>