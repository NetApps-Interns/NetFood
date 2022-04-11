<?php
/**
 * @Class CartStore_Session
 *
 * @author Ebere Alex => Lex3r
 * @copyright Since 20th August, 2020
 * @version 4.0
 * @since 5.6
 * @updated 8th April, 2022
 */

class CartStore_Session
{
    private $cartStore;
    
    public function __construct($sessionID = 'cartStore')
    {
        $this->cartStore = md5($sessionID);
        if (!isset($_SESSION[$this->cartStore])) {
            $this->initCart();
        }
    }

    private function initCart(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[$this->cartStore] = [
            'items' => [],
            'total' => 0,
            'details' => null
        ];
    }

    public function addItem($itemID, $price, $extra = null): bool
    {
        if (is_numeric($price)) {
            $newItem = ['itemID' => $itemID, 'price' => $price, 'qty' => 1, 'extra' => $extra];
            $cart = $_SESSION[$this->cartStore]['items'];
            $added = false;
            foreach ($cart as $key => $item){
                if($item['itemID'] == $itemID){
                    $cart[$key]['price'] += $price;
                    $cart[$key]['qty']++;
                    $added = true;
                }
            }

            if (!$added) {
                $cart[] = $newItem;
            }

            $_SESSION[$this->cartStore]['items'] = $cart;
            $this->addStoreTotal($price);
            return true;
        }
        return false;
    }

    public function removeItem($itemID, int $qty = 1): bool
    {
        if (!$qty){
            throw new RuntimeException("Invalid quantity supplied");
        }

        if (!empty($_SESSION[$this->cartStore]['items'])) {

            foreach ($_SESSION[$this->cartStore]['items'] as $key => $value) {
                if ($value['itemID'] == $itemID) {
                    // $price = (!$set) ? $value['price'] / $value['qty'] : $value['price'];
                    if($qty > $value['qty']){
                        throw new RuntimeException("Supplied quantity is greater than available");
                    }
                    $unitPrice = $value['price'] / $value['qty'];
                    $deduct = $unitPrice * $qty;
                    $this->subStoreTotal($deduct);
                    if (($value['qty'] < 2 || $value['qty'] == $qty)) {
                        unset($_SESSION[$this->cartStore]['items'][$key]);
                    } else {
                        $_SESSION[$this->cartStore]['items'][$key]['price'] -= $deduct;
                        $_SESSION[$this->cartStore]['items'][$key]['qty'] -= $qty;
                    }
                    return true;
                }
            }
        }
        throw new Exception("Unknown error in removing item.");
    }

    public function getItems()
    {
        return $_SESSION[$this->cartStore]['items'] ?: [];
    }

    /**
     * @param $amount int
     * @return bool|int
     */
    public function addStoreTotal($amount)
    {
        return ($_SESSION[$this->cartStore]['items'] && is_numeric($_SESSION[$this->cartStore]['total'] += $amount)) ? $_SESSION[$this->cartStore]['total'] : false;
    }

    /**
     * @param $amount int
     * @return bool|int
     */
    public function subStoreTotal($amount)
    {
        if ($_SESSION[$this->cartStore]['items'] && is_numeric($_SESSION[$this->cartStore]['total'] -= $amount)) {
            return $_SESSION[$this->cartStore]['total'];
        }
        return false;
    }

    /**
     * @return int
     */
    public function getStoreTotal()
    {
        return $_SESSION[$this->cartStore]['total'];
    }

    /**
     * @param mixed $value
     */
    public function addDetail($value)
    {
        $_SESSION[$this->cartStore]['details'] = $value;
    }

    public function getDetails()
    {
        return $_SESSION[$this->cartStore]['details'];
    }

    /**
     * @return bool|array false if array is empty or undefined else <br>
     * [items] => [price, extra] <br>
     * [total] <br>
     */
    public function getCart()
    {
        if (isset($_SESSION[$this->cartStore])) {
            return $_SESSION[$this->cartStore];
        }
        return false;
    }

    public function clearCart()
    {
        $this->initCart();
    }
}