<?php

/**
 * adHotelService form base class.
 *
 * @method adHotelService getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseadHotelServiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'hotel_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'), 'add_empty' => false)),
      'type'     => new sfWidgetFormInputText(),
      'service'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'hotel_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Hotel'))),
      'type'     => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'service'  => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ad_hotel_service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'adHotelService';
  }

}
