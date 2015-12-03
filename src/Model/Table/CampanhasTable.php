<?php
namespace App\Model\Table;

use App\Model\Entity\Campanha;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;

use WideImage\WideImage;

/**
 * Campanhas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class CampanhasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('campanhas');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'ribbon' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'ribbon_dir',   // The name of the field to store the folder
                // 'thumbnailSizes' => [ // Declare your thumbnails
                //     'square' => [   // Define the prefix of your thumbnail
                //         'w' => 200, // Width
                //         'h' => 200, // Height
                //         'crop' => true,  // Crop will crop the image as well as resize it
                //         'jpeg_quality'  => 100,
                //         'png_compression_level' => 9
                //     ],
                //     'portrait' => [     // Define a second thumbnail
                //         'w' => 100,
                //         'h' => 300
                //     ],
                // ],
                'thumbnailMethod' => 'imagick'  // Options are Imagick, Gd or Gmagick
            ]
        ]);

    }

    function afterSave(Event $event, Entity $entity)
    {
        $dirPath = 'files/campanhas/ribbon/' . $entity->ribbon_dir;
        $imagePath = $dirPath . '/' . $entity->ribbon;

        $image = WideImage::load($imagePath );

        // $height = $image->getHeight();
        // $width = $image->getWidth();

        $newWidth = 400;
        $newHeight = 400;

        $image->resize($newWidth, $newHeight)->saveToFile($dirPath . '/ribbon.jpg');
        exit();
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');

        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('photo_dir');

        $validator
            ->requirePresence('tags', 'create')
            ->notEmpty('tags');

        $validator->add('ribbon', 'proffer', [
            'rule' => ['dimensions', [
                'min' => ['w' => 80, 'h' => 80],
                'max' => ['w' => 1200, 'h' => 1200]
            ]],
            'message' => 'Image is not correct dimensions.',
            'provider' => 'proffer'
        ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->isUnique(['title']));
        return $rules;
    }
}
