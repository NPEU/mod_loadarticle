<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_loadarticle
 *
 * @copyright   Copyright (C) NPEU 2019.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;

// Include the loadarticle functions only once
JLoader::register('ModLoadarticleHelper', __DIR__ . '/helper.php');

#$thing = trim($params->get('thing'));

#$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$article = modLoadarticleHelper::getArticle($params);
if ($article) {
    require JModuleHelper::getLayoutPath('mod_loadarticle', $params->get('layout', 'default'));
}
