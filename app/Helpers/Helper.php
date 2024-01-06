<?php

namespace App\Helpers;

class Helper{
    public static function showListCgr($lists)
    {
        $html = '';
        foreach ($lists as $key => $list) {
            $html .= '
                <tr>
                    <td style="text-align:center">' . $list->id . '</td>
                    <td><a class="link-cgr" href="/admin/menus/' . $list->id . '/' . $list->url . '">' . $list->name_category . '</td>
                    <td style="text-align:center">' . ($list->products->count()) . '</td>
                    <td>' . $list->url . '</td>
                    <td style="text-align:center">' . self::status($list->status) . '</td>
                    <td style="text-align:center">
                        <div class="flex align-items-center list-user-action">
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Sửa"
                                href="/admin/menus/edit/' . $list->id . '">
                                <i class="ri-pencil-line"></i>
                            </a>
                            <a class="btn-danger" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Xoá" 
                                href="#" onclick="delRow(' . $list->id . ', \'/admin/menus/delCategory\')">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            ';
            unset($lists[$key]);
        }
        return $html;
    }

    public static function status($status = 0) : string
    {
        return $status == 0 ? '<span class="btn btn-danger" style="font-weight: bold">TẮT</span>' 
                            : '<span class="btn btn-success" style="font-weight: bold">BẬT</span>';
    }

    public static function admin($admin = 0) : string
    {
        return $admin == 0 ? '<span class="btn btn-dark" style="font-weight: bold">Khách</span>' 
                            : '<span class="btn btn-primary" style="font-weight: bold">Admin</span>';
    }

    public static function showListPrd($products)
    {
        $html = '';
        foreach ($products as $key => $product) {
            $html .= '
                <tr>
                    <td style="text-align:center">' . $product->id . '</td>
                    <td style="text-align:center"><img src="' . $product->file . '" width="100px"></td>
                    <td><a href="/admin/products/id-' . $product->id . '/' . $product->url . '" class="link-name">' . $product->name . '</td>
                    <td>' . $product->category->name_category . '</td>
                    <td>' . $product->author . '</td>
                    <td><div class="shortenedText">' . $product->description . '</div></td>
                    <td style="text-align:center">' . self::price($product->price) . '</td>
                    <td>' . $product->nxb . '</td>
                    <td style="text-align:center">' . self::status($product->status) . '</td>
                    <td style="text-align:center">
                        <div class="flex align-items-center list-user-action">
                            <a class="bg-primary" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Sửa"
                                href="/admin/products/edit-product/' . $product->id . '">
                                <i class="ri-pencil-line"></i>
                            </a>
                            <a class="btn-danger" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Xoá" 
                                href="#" onclick="delRow(' . $product->id . ', \'/admin/products/delProduct\')">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            ';
            unset($products[$key]);
        }
        return $html;
    }

    public static function setCgr($categories)
    {
        $html ='';
        foreach ($categories as $key => $category) {
            $html .= ' 
                <li><a href="/danh-muc/' . $category->id . '/' . $category->url . '"><i class="ri-play-circle-line"></i>' . $category->name_category . '</a></li>
            ';
        }
        return $html;
    }

    public static function price($price = 0)
    {
        if ($price != 0) return number_format($price, 0, '', '.');
        return '<a href="lien-he.html" style="color: red">Liên hệ</a>';
    }
}