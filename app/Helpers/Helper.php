<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $father = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent == $parent_id) {
                $html .= '
                <tr>
                    <td> ' . $menu->catName . ' </td>
                    <td> ' . $menu->slug . ' </td>
                    <td> ' . $father . ' </td>
                    <td><a href="/category/edit/' . $menu->id . '" class="btn btn-warning">Edit</a></td>
                    <td><a href="/category/delete/' . $menu->id . '" class="btn btn-danger">Delete</a></td>
                </tr>
                ';

                unset($menus[$key]);
                $html .= self::menu($menus, $menu->id, $father  . $menu->catName);
            }
        }
        return $html;
    }

    public static function menus($menus){
        $html = '';
        foreach ($menus as $key => $father){
            if ($father->parent == 0) {
                $html .= '
                         <li>
                            <a href="javascript:void(0)">'.$father->catName.'</a>';

                foreach ($menus as $child){
                    if($father->id == $child->parent){
                       $html .= '<ul class="sub-menu">
                                    <li>
                                        <a href="/danh-muc/' . $child->id . '-' . $child->slug . '.html">'.$child->catName.'</a>
                                    </li>
                                </ul> ';
                    }
                }
                $html .= '</li>';
            }
        }
        return $html;
    }

    public static function price($price,$sale,$string = null){
        if ($sale > 0){
            return number_format(($price - ($price * $sale / 100)),0,',','.') . $string;
        }else{
            return number_format($price,0,',','.') . $string;
        }
    }

}
