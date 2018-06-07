<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends MY_Model {

    public $table = 'blog';

    public function __construct() {
        parent::__construct();
    }
}
