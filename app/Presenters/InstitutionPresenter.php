<?php

namespace App\Presenters;

use App\Transformers\InstitutionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InstitutionPresenter.
 *
 * @package namespace App\Presenters;
 */
class InstitutionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InstitutionTransformer();
    }
}
