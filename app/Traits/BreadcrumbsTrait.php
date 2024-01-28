<?php

namespace App\Traits;

trait BreadcrumbsTrait
{
    protected $breadcrumbs = [];

    public function addBreadcrumb($label, $url)
    {
        $this->breadcrumbs[] = [
            'label' => $label,
            'url' => $url,
        ];
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }
}
