<?php

namespace app\controllers\admin;

use app\models\admin\Currency;

class CurrencyController extends AppController {

    public function indexAction() {
        $currencies = \R::findAll('currency');
        $this->setMeta('Currency shop');
        $this->set(compact('currencies'));
    }

    public function deleteAction() {
        $id = $this->getRequestID();
        $currency = \R::load('currency', $id);
        \R::trash($currency);
        $_SESSION['success'] = 'Deleted';
        redirect(); 
    }

    public function editAction() {
         if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if (!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if ($currency->update('currency', $id)) {
                $_SESSION['success'] = 'Change save';
                redirect();   
            }
        }
            $id = $this->getRequestID();
            $currency = \R::load('currency', $id);
            $this->setMeta("Edit currency {$currency->title}");
            $this->set(compact('currency'));
    }

    public function addAction() {
        if (!empty($_POST)) {
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if (!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if ($currency->save('currency')) {
                $_SESSION['success'] = 'Currency added';
                redirect();   
            }
            $this->setMeta('New currency');
        }
    }

}