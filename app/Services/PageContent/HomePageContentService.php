<?php

namespace App\Services\PageContent;

class HomePageContentService
{
    /**
     * Get page content.
     *
     * @return string[]
     */
    public function getContent(): array
    {
        return [
            'title' => 'Home',
            'slider_items' => [
                [
                    'img' => url(asset('theme/img/slider/1.jpg')),
                    'h2' => 'Maximize Efficiency with Strategic Engineering Consultations',
                    'h6' => 'Practical renewable energy technology that reduces costs and helps the environment',
                ],[
                    'img' => url(asset('theme/img/slider/2.jpg')),
                    'h2' => 'Efficient Network Protection Units: Designing for Success',
                    'h6' => 'Practical renewable energy technology that reduces costs and helps the environment',
                ],[
                    'img' => url(asset('theme/img/slider/3.jpg')),
                    'h2' => 'Conduct Testing For Commercial Solar Sector',
                    'h6' => 'Practical renewable energy technology that reduces costs and helps the environment',
                ],[
                    'img' => url(asset('theme/img/slider/4.jpg')),
                    'h2' => 'leading supplier of solar materials for contractors',
                    'h6' => 'Practical renewable energy technology that reduces costs and helps the environment',
                ],
            ],

        ];
    }

}
