<?php

/**
 * adHotelTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class adHotelTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object adHotelTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('adHotel');
    }
    
    public function getHotelsMain($cid = ''){
      $q = $this->createQuery('h');
      $q->select('h.name as name, h.small_photo as sphoto, h.minrate as minrate, h.class_and as start, h.address as address, h.city as city, h.city_id as city_id, d.description as description, h.slug as slug');
      $q->innerJoin('h.HotelDescs as d');
      $q->where('d.descriptiontype_id = 6');
      if($cid!='') $q->andWhere('h.city_id = ?',$cid);
      $q->orderBy('h.class_and DESC');
      $q->limit(8);
//      echo $q->getSqlQuery(); die();
      return $q->fetchArray();
    }
    public function getHotelsCity($cid, $order =''){
      $q = $this->createQuery('h');
      $q->select('h.*, d.description as description');
      $q->innerJoin('h.HotelDescs as d');
      $q->where('d.descriptiontype_id = 6');
      $q->andWhere('h.city_id = ?',$cid);
      if($order == '') $q->orderBy('h.class_and DESC');
      elseif($order == 'minrate') $q->orderBy('minrate ASC');
      else $q->orderBy('h.'.$order.' DESC');
//      echo $q->getSqlQuery(); die();
      return $q;
    }
    public function getHotelsCityResult($cid,$htids, $order =''){
      $q = $this->createQuery('h');
      $q->select('h.*, d.description as description');
      $q->innerJoin('h.HotelDescs as d');
      $q->where('d.descriptiontype_id = 6');
      $q->andWhereIn('h.id',$htids);
      $q->andWhere('h.city_id = ?',$cid);
      if($order == '') $q->orderBy('h.class_and DESC');
      elseif($order == 'minrate') $q->orderBy('minrate ASC');
      else $q->orderBy('h.'.$order.' DESC');
//      echo $q->getSqlQuery(); die();
      return $q;
    }
    public function getHotelsNearby($lo, $la, $lod, $lad){
      $q = $this->createQuery();
      $q->where('latitude > '.($la - $lad));
      $q->andWhere('latitude < '.($la + $lad));
      $q->andWhere('longitude > '.($lo - $lod));
      $q->andWhere('longitude < '.($lo + $lod));
      $q->orderBy('latitude, longitude');
      $q->limit(4);
      return $q->fetchArray();
    }
//    public function getHotel($hid){
//      $q = $this->createQuery('h');
//      $q->select('h.*, d.description as description');
//      $q->innerJoin('h.HotelDescs as d');
//      $q->where('d.descriptiontype_id = 6');
//      $q->andWhere('h.city_id = ?',$cid);
//      if($order == '') $q->orderBy('h.class_and DESC');
//      elseif($order == 'minrate') $q->orderBy('minrate ASC');
//      else $q->orderBy('h.'.$order.' DESC');
////      echo $q->getSqlQuery(); die();
//      return $q;
//    }
}