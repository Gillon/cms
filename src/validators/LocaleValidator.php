<?php
namespace Craft;

/**
 * Will validate that the given attribute is a valid site locale ID.
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @see       http://buildwithcraft.com
 * @package   craft.app.validators
 * @since     1.0
 */
class LocaleValidator extends \CValidator
{
	////////////////////
	// PROTECTED METHODS
	////////////////////

	/**
	 * @param $object
	 * @param $attribute
	 *
	 * @return null
	 */
	protected function validateAttribute($object, $attribute)
	{
		$locale = $object->$attribute;

		if ($locale && !in_array($locale, craft()->i18n->getSiteLocaleIds()))
		{
			$message = Craft::t('Your site isn’t set up to save content for the locale “{locale}”.', array('locale' => $locale));
			$this->addError($object, $attribute, $message);
		}
	}
}
