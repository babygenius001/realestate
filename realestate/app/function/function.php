<?php

use Carbon\Carbon;
use App\m_news_categories;

function getNameImage($file_originalName='')
{
    $stringClear = [' ','-',':'];
	$date = Carbon::now('Asia/Ho_Chi_Minh');
    $name = $date->toDateTimeString() . "_" . $file_originalName;
    return str_replace($stringClear, "", $name);
}

function getDateNow()
{
	$date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    return $date;
}
function getYearNow()
{
	$date = Carbon::now('Asia/Ho_Chi_Minh')->year;
    return $date;
}

function stringConvertName($value='')
{
	# code...
	$date = Carbon::now('Asia/Ho_Chi_Minh');
    $date->toDateTimeString();
}
function imageChecker($file_extension = null)
{
	$extensionOfImg = ['svg','SVG','jpg','png','PNG','JPG','gif','GIF'];
	if(!in_array($file_extension,$extensionOfImg)) return false;
	return true;
}

function getTreeParent($id, $parent = null) {
	$DB_tree_lv2 = m_news_categories::select('id','name')->where('parent_id', '=', $id)->get();
	if ($DB_tree_lv2 == null) {
		return null;
	}

	foreach ($DB_tree_lv2 as $tree_lv2) {
		echo "<option ";
		if($tree_lv2->id == $parent) {
			echo " selected='selected' ";
		}
		echo "value='" . $tree_lv2->id . "'> &lfloor;__" . $tree_lv2->name .'</option>';
	}
}

function getNewsCategoriesMenu($id, $parent = null) {
	$DB_tree_lv2 = m_news_categories::select('id','alias','name')->where('parent_id', '=', $id)->get();
	if ($DB_tree_lv2 == null) {
		return null;
	}

	foreach ($DB_tree_lv2 as $tree_lv2) {
		echo "<div class='menu_lv_2'><div class='item_lv_2'>";
		echo "<a href='" . route('NRGNews_getCates',['alias'=>$tree_lv2->alias,'id'=>$tree_lv2->id]) . "'>" . $tree_lv2->name ;
		echo "</a></div></div>";
	}
}