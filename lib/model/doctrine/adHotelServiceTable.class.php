<?php

/**
 * adHotelServiceTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class adHotelServiceTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object adHotelServiceTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('adHotelService');
    }
    public function getService($hid){
        $q = $this->createQuery()
            ->where('hotel_id = ?', $hid)
            ->fetchArray();
        
        return $q;
    }
}