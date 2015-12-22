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
    public $max = 396;

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

    function beforeSave(Event $event, Entity $entity)
    {
        $dirPath = 'files/campanhas/ribbon/' . $entity->ribbon_dir;
        $imagePath = $dirPath . '/' . $entity->ribbon;

        $ext = image_type_to_extension(getimagesize($imagePath)[2]);

        $image = WideImage::load($imagePath);

        $height = $image->getHeight();
        $width = $image->getWidth();

        $greater = $height;

        if ($width >= $height) {
            $geater = $height;
        }

        $ribbonImageName = md5($entity->ribbon) . $ext;
        $entity->ribbon_image_name = $ribbonImageName;

        $newImagePath = $dirPath . '/' . $ribbonImageName;

        if ($greater > $this->max) {
            $image->resize($this->max, $this->max)->saveToFile($newImagePath);
        } else {
            $image->saveToFile($newImagePath);
        }
        
        // $newImage = WideImage::load($newImagePath);
        // $newImage = $newImage->resize($entity->ribbon_width, $entity->ribbon_height);

        // $facebookImagePath = 'http://graph.facebook.com/'.$entity->facebook_id_placeholder.'/picture?type=square&width=400&height=400';
        // $facebookImage = WideImage::load($facebookImagePath);
        // $facebookImage = $facebookImage
        //     ->resize($this->max, $this->max)
        //     ->crop('top', 'center', $this->max, $this->max);
        
        // $new = $facebookImage
        //     ->merge($newImage, 'left + ' . $entity->ribbon_left, 'top + ' . $entity->ribbon_top, ($entity->ribbon_opacity * 100));

        // $new->saveToFile($dirPath . '/final.png');
    }
    // protected function _calcNewDimensions($size)
    // {
    //     $max = 400;
    //     if ($size['w'] > $size.['h']) {
    //         $size['newW'] = $max;
    //         $size['newH'] = $this->_calcProporcao($size['w'], $max, $size['h']);
    //     } else {
    //         $size['newH'] = $max;
    //         $size['newW'] = $this->_calcProporcao($size['h'], $max, $size['w']);
    //     }
    //     return $size;
    // }
    // protected function calcProporcao($maior, $novoValor, $menor){
    //     $percent = ($novoValor*100) / $maior;
    //     $novoMenor = ($menor*$percent) / 100;
    //     return $novoMenor;
    // }
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
            ->requirePresence('ribbon', 'create')
            ->allowEmpty('ribbon');

        $validator
            ->allowEmpty('photo_dir');

        $validator
            ->requirePresence('tags', 'create')
            ->notEmpty('tags');
        /**
         * Por enquanto não restringir resolução maxima, apenas tamanh do arquivo
         * já basta, afinal a imagem será redimensionada
         */
        // $validator->add('ribbon', 'proffer', [
        //     'rule' => ['dimensions', [
        //         'min' => ['w' => 80, 'h' => 80],
        //         'max' => ['w' => 1200, 'h' => 1200]
        //     ]],
        //     'message' => 'Image is not correct dimensions.',
        //     'provider' => 'proffer'
        // ]);

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
