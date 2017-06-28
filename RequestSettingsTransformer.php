<?php
namespace App\ApiTransformers;

use Illuminate\Database\Eloquent\Model;

class RequesterSettingsTransformer extends Transformer
{
    /**
     * @param Model $model
     *
     * @return array
     */
    public function transform(Model $model)
    {
        return [
            'id' => $model->id,
            'background' => $model->background,
            'domain' => $model->domain,
            'logo' => $model->logo,
            'general_text' => $model->general_text,
            'general_title' => $model->general_title,
            'negative_text' => $model->negative_text,
            'negative_title' => $model->negative_title,
            'positive_text' => $model->positive_text,
            'positive_title' => $model->positive_title
        ];
    }
}