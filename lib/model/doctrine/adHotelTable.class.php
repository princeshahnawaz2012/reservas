<?php

/**
 * adHotelTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class adHotelTable extends Doctrine_Table {
  /**
   * Returns an instance of this class.
   *
   * @return object adHotelTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('adHotel');
  }
  public function getNumHotels($facility = array(), $htids = '') {
    $ar =array();
    unset($facility['all']);
    for($i=1;$i<=5;$i++) {
      $q = $this->createQuery('h');
      $q->select('COUNT(h.id) as star');
      $q->where('class_and ='.$i);
      $q->leftJoin('h.HotelDescs as d');
      $q->andWhere('d.descriptiontype_id = 6');

//      $q->where('d.descriptiontype_id = 6');

      $faci_cad='';
      foreach ($facility as $f) {
        if($f) {
          $faci_cad.= 'd.description like "%'.$f.'%" OR ';
        }
      }
      substr($faci_cad,0,-4)?$q->andWhere(substr($faci_cad,0,-4)):'';
      if($htids != '') $q->andWhereIn('h.id',$htids);

      $star1 = $q->fetchOne();
      $ar[$i] = $star1['star'];
    }
    return $ar;
  }


  public function getHotelsMain($cid = '') {
    $q = $this->createQuery('h');
    $q->select('h.name as name, h.small_photo as sphoto, h.minrate as minrate, h.class_and as start, h.address as address, h.city as city, h.city_id as city_id, d.description as description, h.slug as slug');
    $q->innerJoin('h.HotelDescs as d');
    $q->where('d.descriptiontype_id = 6');
    if($cid!='') $q->andWhere('h.city_id = ?',$cid);
    $q->orderBy('h.class_and DESC, RAND()');
    $q->limit(8);
//      echo $q->getSqlQuery(); die();
    return $q->fetchArray();
  }
  public function getHotelsCity($cid = '', $order = '', $star = array(), $facility = array()) {
    unset($facility['all']);
//      print_r($facility);die();
    $q = $this->createQuery('h');
    $q->select('h.*, d.description as description');
    $q->leftJoin('h.HotelDescs as d');
//      $q->where('d.descriptiontype_id = 6');
    $star_cad = '';
    foreach ($star as $s) {
      if($s) {
        if($s == 'all') {
          $star_cad.='';
        }else $star_cad.= 'h.class_and = '.$s.' OR ';
      }
    }
    substr($star_cad,0,-4)?$q->andWhere(substr($star_cad,0,-4)):'';
    $faci_cad='';
    foreach ($facility as $f) {
      if($f) {
        $faci_cad.= 'd.description like "%'.$f.'%" OR ';
      }
    }
    substr($faci_cad,0,-4)?$q->andWhere(substr($faci_cad,0,-4)):'';

    if($cid != '') $q->andWhere('h.city_id = ?',$cid);
    if($order == 'pop') $q->orderBy('h.review_nr DESC');
    elseif($order == 'opi') $q->orderBy('h.ranking DESC');
    elseif($order == 'est') $q->orderBy('h.class_and DESC');
    elseif($order == 'pre') $q->orderBy('h.minrate ASC');
    else $q->orderBy('h.name ASC');
//      echo $q->getSqlQuery(); die();
    return $q;
  }
  public function getHotelsTour($la, $lo, $lad, $lod, $order = '', $star = array(), $facility = array()) {
    unset($facility['all']);
//      print_r($facility);die();
    $q = $this->createQuery('h');
    $q->select('h.*, d.description as description, SQRT(POW((h.latitude - '.$la.'),2) + POW((h.longitude - '.$lo.'),2)) + as algo');
    $q->leftJoin('h.HotelDescs as d');
    $q->where('h.latitude > '.($la - $lad));
    $q->andWhere('h.latitude < '.($la + $lad));
    $q->andWhere('h.longitude > '.($lo - $lod));
    $q->andWhere('h.longitude < '.($lo + $lod));
//      $q->where('d.descriptiontype_id = 6');
    $star_cad = '';
    foreach ($star as $s) {
      if($s) {
        if($s == 'all') {
          $star_cad.='';
        }else $star_cad.= 'h.class_and = '.$s.' OR ';
      }
    }
    substr($star_cad,0,-4)?$q->andWhere(substr($star_cad,0,-4)):'';
    $faci_cad='';
    foreach ($facility as $f) {
      if($f) {
        $faci_cad.= 'd.description like "%'.$f.'%" OR ';
      }
    }
    substr($faci_cad,0,-4)?$q->andWhere(substr($faci_cad,0,-4)):'';
//    echo $order;die();
    if($order == 'nea') $q->orderBy('algo ASC');
    elseif($order == 'pop') $q->orderBy('h.review_nr DESC');
    elseif($order == 'opi') $q->orderBy('h.ranking DESC');
    elseif($order == 'est') $q->orderBy('h.class_and DESC');
    elseif($order == 'pre') $q->orderBy('h.minrate ASC');
    else $q->orderBy('algo ASC');
//      echo $q->getSqlQuery(); die();
    return $q;
  }
  public function getHotelsCityResult($cid,$htids, $order ='') {

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

  public function getHotelsCityResult2($cid,$htids,$star = array(),$facility = array(),$order='') {
    unset($facility['all']);
    $q = $this->createQuery('h');
    $q->select('h.*, d.description as description');
    $q->innerJoin('h.HotelDescs as d');
    $q->where('d.descriptiontype_id = 6');
    $q->andWhereIn('h.id',$htids);
    $q->andWhere('h.city_id = ?',$cid);
    $star_cad = '';
    foreach ($star as $s) {
      if($s) {
        if($s == 'all') {
          $star_cad.='';
        }else $star_cad.= 'h.class_and = '.$s.' OR ';
      }
    }
    substr($star_cad,0,-4)?$q->andWhere(substr($star_cad,0,-4)):'';
    $faci_cad='';
    foreach ($facility as $f) {
      if($f) {
        $faci_cad.= 'd.description like "%'.$f.'%" OR ';
      }
    }
    substr($faci_cad,0,-4)?$q->andWhere(substr($faci_cad,0,-4)):'';
    if($order == 'pop') $q->orderBy('h.review_nr DESC');
    elseif($order == 'opi') $q->orderBy('h.ranking DESC');
    elseif($order == 'est') $q->orderBy('h.class_and DESC');
    elseif($order == 'pre') $q->orderBy('h.minrate ASC');
    else $q->orderBy('h.review_nr DESC');
    return $q;
  }

  public function getHotelsNearby($lo, $la, $lod, $lad, $hid) {
    $q = $this->createQuery();
    $q->where('latitude > '.($la - $lad));
    $q->andWhere('latitude < '.($la + $lad));
    $q->andWhere('longitude > '.($lo - $lod));
    $q->andWhere('longitude < '.($lo + $lod));
    $q->andWhereNotIn('id', array($hid));
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