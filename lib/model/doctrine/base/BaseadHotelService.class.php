<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('adHotelService', 'doctrine');

/**
 * BaseadHotelService
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $hotel_id
 * @property string $type
 * @property string $service
 * @property adHotel $Hotel
 * 
 * @method integer        getId()       Returns the current record's "id" value
 * @method integer        getHotelId()  Returns the current record's "hotel_id" value
 * @method string         getType()     Returns the current record's "type" value
 * @method string         getService()  Returns the current record's "service" value
 * @method adHotel        getHotel()    Returns the current record's "Hotel" value
 * @method adHotelService setId()       Sets the current record's "id" value
 * @method adHotelService setHotelId()  Sets the current record's "hotel_id" value
 * @method adHotelService setType()     Sets the current record's "type" value
 * @method adHotelService setService()  Sets the current record's "service" value
 * @method adHotelService setHotel()    Sets the current record's "Hotel" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseadHotelService extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ad_hotel_service');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('hotel_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('type', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('service', 'string', 2000, array(
             'type' => 'string',
             'length' => 2000,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('adHotel as Hotel', array(
             'local' => 'hotel_id',
             'foreign' => 'id'));
    }
}