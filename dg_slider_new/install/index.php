<?

class dg_slider_new extends CModule
{
	var $MODULE_ID = "dg_slider_new";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $PARTNER_NAME;
	var $PARTNER_URI;

	function dg_slider_new()
	{
		$arModuleVersion = array();
		
		include(substr(__FILE__, 0,  -10)."/version.php");
		
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		
		$this->MODULE_NAME = "Слайдер DG – слайдер картинок из инфоблока";
		$this->MODULE_DESCRIPTION = "После установки вы сможете пользоваться компонентом dg:slider";
		
		$this->PARTNER_NAME = "ООО «Ди–групп»"; 
		$this->PARTNER_URI = "http://www.digroupspb.ru";
	}
	
	
	function InstallFiles($arParams = array())
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/dg_slider_new/install/components",
		             $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/dg_slider_new/install/js", 
					 $_SERVER["DOCUMENT_ROOT"]."/bitrix/js", true, true);
		/*CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/dg_slider_new/install/images", 
					 $_SERVER["DOCUMENT_ROOT"]."/bitrix/images", true, true);*/
		return true;
	}
	
	function UnInstallFiles()
	{
		DeleteDirFilesEx("/bitrix/components/digroup/slider_new");
		DeleteDirFilesEx("/bitrix/js/dg_slider_new/");
		//DeleteDirFilesEx("/bitrix/images/dg_slider_new/");
		return true;
	}
	
	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->InstallFiles();
		RegisterModule("dg_slider_new");
		$APPLICATION->IncludeAdminFile("Установка модуля dg_module", $DOCUMENT_ROOT."/bitrix/modules/dg_slider_new/install/step.php");
	}
	
	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->UnInstallFiles();
		UnRegisterModule("dg_slider_new");
		$APPLICATION->IncludeAdminFile("Деинсталляция модуля dg_module", $DOCUMENT_ROOT."/bitrix/modules/dg_slider_new/install/unstep.php");
	}
}
?>