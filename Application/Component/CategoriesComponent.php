<?php

namespace Aggrosoft\ActiveExternalCategories\Application\Component;

use OxidEsales\Eshop\Core\Registry;

class CategoriesComponent extends CategoriesComponent_parent {

    protected function _getActCat() // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
    {
      $sActCat = parent::_getActCat();

      if (!$sActCat || $sActCat === \OxidEsales\Eshop\Core\Registry::getConfig()->getActiveShop()->oxshops__oxdefcat->value) {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri) {
            $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
            $sSelect = 'SELECT oxid FROM oxcategories WHERE oxextlink = :oxextlink AND oxshopid = :oxshopid';
            $sExtCat = $oDb->getOne($sSelect, [
                'oxextlink' => $uri,
                'oxshopid' => Registry::getConfig()->getShopId()
            ]);
            if ($sExtCat) {
                $sActCat = $sExtCat;
            }
        }
      }

      return $sActCat;
    }

}