<?php

class Cart {
    private $items = [];

    public function addItem($id, $name, $price) {
        $this->items[$id] = ['name' => $name, 'price' => $price];
    }

    public function removeItem($id) {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'];
        }
        return $total;
    }
}
?>
