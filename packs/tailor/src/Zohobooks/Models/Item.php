<?php
namespace Dani\Tailor\Zohobooks\Models;
use Dani\Tailor\Zohobooks\Models\ZohobookModel;

class Item extends ZohobookModel{
  protected $uri = 'items';
  protected $primary_key = 'item_id';

}