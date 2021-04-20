<?php

namespace GamaAcademy\ModuleConfigDemo\Model;

class Example implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => 'Rodrigo',
                'label' => __('Rodrigo')
            ],
            [
                'value' => 'Ribeiro',
                'label' => __('Ribeiro')
            ]
        ];
    }
}
