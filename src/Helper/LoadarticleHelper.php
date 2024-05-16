<?php

namespace NPEU\Module\Loadarticle\Site\Helper;

use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Factory;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

/**
 * Helper for mod_loadarticle
 *
 * @since  1.5
 */
class LoadarticleHelper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;


    public function getArticle(Registry $config, SiteApplication $app): object
    {
        if (!$app instanceof SiteApplication) {
            return [];
        }
        $db = $this->getDatabase();

        $query = '
SELECT con.id, con.alias, con.introtext, con.fulltext, cat.alias as catalias, con.catid, con.title
FROM #__content as con
JOIN #__categories as cat ON con.catid = cat.id
WHERE con.alias = "' . $config->get('alias') . '"
AND cat.path = "' . $config->get('path') . '";
';

        $db->setQuery($query);
        return $db->loadObject();
    }

}
