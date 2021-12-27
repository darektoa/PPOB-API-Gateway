<?php

namespace App\Traits\Resource;

use Illuminate\Database\Eloquent\Model;

trait FlexParam {
    protected function flexParamInit() {
        $model  = CustomModel::make($this->resource);
        $this->resource = $model;
    }
}


class CustomModel extends Model {
    static public function make($props) {
        $model  = new static();
        $props  = collect($props);
        $props->each(fn($item, $key) => $model->$key = $item);

        return $model;
    }
}