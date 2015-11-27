<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Utility\Inflector;

/**
 * Campanha Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $title
 * @property string $text
 * @property string $photo
 * @property string $photo_dir
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $slug
 */
class Campanha extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setTitle($title)
    {
        $this->set('slug', Inflector::slug(strtolower($title), '-'));
        return $title;
    }
    protected function _getImgFullPath()
    {
        return 'tey';
    }
    protected function _getUrl()
    {
        return ['controller' => 'Site', 'action' => 'campanha', $this->_properties['slug']];
    }
}
