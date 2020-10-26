<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model {

    use Translatable;

    function getFirstNWordsFromBody($limit = 100, $break = ' ', $pad = '...') {
        $string = strip_tags($this->body);
        if (strlen($string) > $limit) {
            $string = substr($string, 0, $limit);
            $end    = strrpos($string, $break);
            if ($end) {
                return substr($string, 0, $end + 1) . $pad;
            } else {
                return $string . $pad;
            }
        } else {
            return $string;
        }
    }

}
