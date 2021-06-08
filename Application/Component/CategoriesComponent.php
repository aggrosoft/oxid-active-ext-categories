<?php

namespace Aggrosoft\ActiveExternalCategories\Application\Component;

class CategoriesComponent extends CategoriesComponent_parent {

    protected function _getActCat() // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
    {
      $sActCat = parent::_getActCat();

      if (!$sActCat || $sActCat === \OxidEsales\Eshop\Core\Registry::getConfig()->getActiveShop()->oxshops__oxdefcat->value) {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri) {
            $oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
            $sSelect = 'SELECT oxid FROM oxcategories WHERE oxextlink = :oxextlink AND oxshopid = :oxshopid';
            $sActCat = $oDb->getOne($sSelect, [
                'oxextlink' => $uri,
                'oxshopid' => Registry::getConfig()->getShopId()
            ]);
        }
      }

      return $sActCat;
    }

}