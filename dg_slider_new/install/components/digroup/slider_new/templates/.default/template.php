<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
      <div class="jcarousel" id="jcarousel" style="width:<?=$arParams["SLIDER_WIDTH"];?>px;height:<?=$arParams["SLIDER_HEIGHT"];?>px">
        <ul> 	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["HIDE_LINK_WHEN_NO_DETAIL"] != "N"):?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="slider_link" title="<?=$arItem["NAME"]?>">
		<?endif;?>		
		<?if($arParams["DISPLAY_PICTURE"]!="N" && (is_array($arItem["PREVIEW_PICTURE"]) || $arItem["DISPLAY_PROPERTIES"]['REAL_PICTURE']['FILE_VALUE'])):?>
			<?if(isset($arItem["DISPLAY_PROPERTIES"]['REAL_PICTURE']['FILE_VALUE'])):?>
				<img class="preview_picture" border="0" src="<?=$arItem["DISPLAY_PROPERTIES"]['REAL_PICTURE']['FILE_VALUE']["SRC"]?>" width="<?=$arItem["DISPLAY_PROPERTIES"]['REAL_PICTURE']['FILE_VALUE']["WIDTH"]?>" height="<?=$arItem["DISPLAY_PROPERTIES"]['REAL_PICTURE']['FILE_VALUE']["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"/>
			<?else:?>
				<img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"/>
			<?endif;?>
		<?if($arParams["HIDE_LINK_WHEN_NO_DETAIL"] != "N"):?>
			</a>
		<?endif;?>	
		<?endif?>
		<?if (($arItem["PREVIEW_TEXT"]&&$arParams["DISPLAY_PREVIEW_TEXT"]!="N")):?>
			<div>
				<p>
					<?echo $arItem["PREVIEW_TEXT"];?>
				</p>
			</div>
		<?endif;?>
	</li>
<?endforeach;?>
</ul>
			<?if ($arParams["DISPLAY_NAV_BUTTONS"] != "N"){?>
				<div class="jcarousel-scroll" id="jcarousel-scroll">
					<a href="#" class="jcarousel-control-prev" id="jcarousel-control-prev">&lsaquo;</a>
					<a href="#" class="jcarousel-control-next" id="jcarousel-control-next">&rsaquo;</a>
				</div>	
			<?}?>
			<?if ($arParams["DISPLAY_NAV_STRING"] != "N"){?>			
                <p class="jcarousel-pagination" id="jcarousel-pagination">
                    
                </p>
			<?}?>            			
			</div>