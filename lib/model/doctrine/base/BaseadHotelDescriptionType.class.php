<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('adHotelDescriptionType', 'doctrine');

/**
 * BaseadHotelDescriptionType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $languagecode
 * @property string $name
 * @property Doctrine_Collection $HotelDescs
 * 
 * @method integer                getId()           Returns the current record's "id" value
 * @method string                 getLanguagecode() Returns the current record's "languagecode" value
 * @method string                 getName()         Returns the current record's "name" value
 * @method Doctrine_Collection    getHotelDescs()   Returns the current record's "HotelDescs" collection
 * @method adHotelDescriptionType setId()           Sets the current record's "id" value
 * @method adHotelDescriptionType setLanguagecode() Sets the current record's "languagecode" value
 * @method adHotelDescriptionType setName()         Sets the current record's "name" value
 * @method adHotelDescriptionType setHotelDescs()   Sets the current record's "HotelDescs" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseadHotelDescriptionType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_hotel_description_type');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('languagecode', 'string', 2, array(
             'type' => 'string',
             'default' => 'es',
             'length' => 2,
             ));
        $this->hasColumn('name', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('adHotelDescription as HotelDescs', array(
             'local' => 'id',
             'foreign' => 'descriptiontype_id'));
    }
}