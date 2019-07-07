<?php


namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $table = "menu_items";
    protected $softDelete = true;


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    public function childs() {
        return $this->hasMany(MenuItem::class,'parent_id','id')->orderBy('order_by') ;
    }


    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id','id');
    }

    // Recursive function that builds the menu from an array or object of items
    // In a perfect world some parts of this function would be in a custom Macro or a View
    public function buildMenu($menu, $parentid = 0)
    {
        $result = null;
        foreach ($menu as $item)

            if ($item->parent_id == $parentid) {
                $result .= "<li class='dd-item nested-list-item' data-order='{$item->order_by}' data-id='{$item->id}'>
	      <div class='dd-handle nested-list-handle'>
	        <span class='glyphicon glyphicon-move'></span>
	      </div>
	      <div class='nested-list-content'>{$item->title}
	        <div class='pull-right'>
	          <a href='#modalEdit' class='menu-item-edit modal-basic'
	           data-url='".route("admin.menu.item.update")."'
	           data-item-id='{$item->id}'
	           data-icon='{$item->icon_class}'
	           data-item-title='{$item->title}'
	           data-menu-item-url-name='{$item->permission->name}'
	           data-permission-id='{$item->permission_id}'>Edit</a> |
	          <a href='#modalDelete' style='color:red;' class='delete_toggle modal-basic' rel='{$item->id}' data-url='".route("admin.menu.item.delete")."'>Delete</a>
	        </div>
	      </div>".$this->buildMenu($menu, $item->id) . "</li>";
            }
        return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }

    // Getter for the HTML menu builder
    public function getHTML($items)
    {
        return $this->buildMenu($items);
    }
    public function getLeftSideMenus($items)
    {
        return $this->buildLeftSideMenu($items);
    }

}