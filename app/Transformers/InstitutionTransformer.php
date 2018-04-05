<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Institution;

/**
 * Class InstitutionTransformer.
 *
 * @package namespace App\Transformers;
 */
class InstitutionTransformer extends TransformerAbstract
{
    /**
     * Transform the Institution entity.
     *
     * @param \App\Entities\Institution $model
     *
     * @return array
     */
    public function transform(Institution $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
