<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Utility\Inflector;

/**
 * Categoria Entity.
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \App\Model\Entity\Campanha[] $campanhas
 */
class Categoria extends Entity
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
    protected function _setName($name)
    {
        $this->set('slug', Inflector::slug(strtolower($name), '-'));
        return $name;
    }
    protected function _getUrl()
    {
        return ['controller' => 'Site', 'action' => 'categoria', $this->_properties['slug']];
    }
}
