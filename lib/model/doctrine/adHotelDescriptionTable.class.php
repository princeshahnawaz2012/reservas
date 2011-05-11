<?php

/**
 * adHotelDescriptionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class adHotelDescriptionTable extends Doctrine_Table {

  /**
   * Returns an instance of this class.
   *
   * @return object adHotelDescriptionTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('adHotelDescription');
  }

  public function getInfoAditional($hid){
    $q = $this->createQuery();
    $q->where('hotel_id = ?',$hid);
    $q->andWhereIn('descriptiontype_id', array(2,7,8));
    return $q->execute();
  }
}