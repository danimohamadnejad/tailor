<?php
namespace Dani\Tailor\Interfaces;
interface InvoiceableInterface {
    public function to_item_array() : array;
}