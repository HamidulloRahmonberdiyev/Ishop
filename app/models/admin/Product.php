<?php

namespace app\models\admin;

use app\models\AppModel;

class Product extends AppModel {

    public $attributes = [
        'title' => '',
        'category_id' => '',
        'keywords' => '',
        'description' => '',
        'price' => '',
        'old_price' => '',
        'content' => '',
        'status' => '',
        'hit' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
        ],
        'integer' => [
            ['category_id'],
        ],
    ];

    public function editRelatedProduct($id, $data) {
        $related_product = \R::getCol('SELECT related_id FROM related_product WHERE product_id = ?', [$id]);
        // If filters have contact product - delete and write new ones
        if (empty($data['related']) && !empty($related_product)) {
            \R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);
            return; 
        }
        // If contact product are added
        if (empty($related_product) && !empty($data['related'])) {
            $sql_part = '';
            foreach ($data['related'] as $v) {
                $v = (int)$v;
                $sql_part .= "($id, $v),";
            }
            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
            return;
        }
        // If filters have contact product - delete and write new ones
        if (!empty($data['related'])) {
            $result = array_diff($related_product, $data['related']);
            if (!empty($result) || count($related_product) != count($data['related'])) {
                \R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['related'] as $v) {
                    $v = (int)$v;
                    $sql_part .= "($id, $v),";
                }
                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
            }
        }
    }


    public function editFilter($id, $data) {
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
    
        // If filters have changed - delete and write new ones
        if (empty($data['title']) && !empty($filter)) {
            \R::exec("DELETE FROM attribute_product WHERE product_id = ?", [$id]);
            return;
        }
        

        // If filters are added
        if (empty($filter) && !empty($data['attrs'])) {
            $sql_part = '';
            foreach ($data['attrs'] as $v) {
                $sql_part .= "($v, $id),";
            }
            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
        }

        // If filters have changed - delete and write new ones
        if (!empty($data['attars'])) {
            $result = array_diff($filter, $data['attrs']);
            if (!$result || count($filter) != count($data['attrs'])) {
                \R::exec("DELETE FROM attribute_product WHERE product_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['attrs'] as $v) {
                    $sql_part .= "($v, $id),";
                }
                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO attribute_product (attr_id, product_id) VALUES $sql_part");
            }
        }
    }
    
    public function getImg() {
        if (!empty($_SESSION['single'])) {
            $this->attributes['img'] = $_SESSION['single'];
            unset($_SESSION['single']);
        }
    }

    public function saveGallery($id) {
        if (!empty($_SESSION['multi'])) {
            $sql_part = '';
            foreach ($_SESSION['multi'] as $v) {
                $sql_part .= "('$v', $id),";
            }
            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO gallery (img, product_id) VALUES $sql_part");
            unset($_SESSION['multi']);
        }
    }

    public function uploadImg($name, $wmax, $hmax){
        $uploaddir = WWW . '/images/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // tasvirni kengaytirish
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // to'g'ri kengaytmalar qatori
        if($_FILES[$name]['size'] > 1048576){
            $res = array("error" => "Error! The maximum file size is 1 Mb!");
            exit(json_encode($res));
        }
        if($_FILES[$name]['error']){
            $res = array("error" => "Error! The file may be too large.");
            exit(json_encode($res));
        }
        if(!in_array($_FILES[$name]['type'], $types)){
            $res = array("error" => "Valid extensions - .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = md5(time()).".$ext";
        $uploadfile = $uploaddir.$new_name;
        if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)){
            if($name == 'single'){
                $_SESSION['single'] = $new_name;
            }else{
                $_SESSION['multi'][] = $new_name;
            }
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res = array("file" => $new_name);
            exit(json_encode($res));
        }
    }

    /**
     * @param string $target путь к оригинальному файлу
     * @param string $dest путь сохранения обработанного файла
     * @param string $wmax максимальная ширина
     * @param string $hmax максимальная высота
     * @param string $ext расширение файла
     */
    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - square, <1 - landscape, >1 - portrait

        if(($wmax / $hmax) > $ratio){
            $wmax = $hmax * $ratio;
        }else{
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch($ext){
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax); // create a wrapper for a new image

        if($ext == "png"){
            imagesavealpha($newImg, true); // save alpha channel
            $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // add transparency
            imagefill($newImg, 0, 0, $transPng); //pouring
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // copy and resize image
        switch($ext){
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}