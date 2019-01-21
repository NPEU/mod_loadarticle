<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_loadarticle
 *
 * @copyright   Copyright (C) NPEU 2019.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;

use Joomla\String\StringHelper;

/**
 * Helper for mod_loadarticle
 */
class ModLoadarticleHelper
{
    /**
     * Loads an article into a module position. Finds alias/path as opposed to ID's.
     *
     * @param   \Joomla\Registry\Registry  &$params  module parameters object
     *
     * @return  mixed
     */
    public static function getArticle(&$params)
    {
        $lang = JFactory::getLanguage();
        $extension = 'com_content';
        $base_dir = JPATH_SITE;
        $language_tag = 'en-GB';
        $reload = true;
        $lang->load($extension, $base_dir, $language_tag, $reload);

        $db = JFactory::getDBO();
        $query = '
SELECT con.id, con.alias, con.introtext, con.fulltext, cat.alias as catalias, con.catid, con.title
FROM #__content as con
JOIN #__categories as cat ON con.catid = cat.id
WHERE con.alias = "' . $params->get('alias') . '"
AND cat.path = "' . $params->get('path') . '";
';
        $db->setQuery($query);
        return $db->loadObject();
    }
}
