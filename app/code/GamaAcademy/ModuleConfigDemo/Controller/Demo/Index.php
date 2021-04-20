<?php

namespace GamaAcademy\ModuleConfigDemo\Controller\Demo;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;

class Index implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\Controller\Result\RawFactory
     */
    private $resultRawFactory;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * Index constructor.
     * @param Product $product
     * @param ProductFactory $productFactory
     * @param \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
     */
    public function __construct(
        Product $product,
        ProductFactory $productFactory,
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
    )
    {
        $this->resultRawFactory = $resultRawFactory;
        $this->product = $product;
        $this->productFactory = $productFactory;
    }

    /**
     * testing purposes
     */
    public function execute()
    {
        $ids = [53, 54, 55];

        //SINGLETON EXAMPLE
        foreach ($ids as $id) {
            $product = $this->product->load($id);
            $product->setMyFakeAttribute('produto_com_singleton');
            echo '<br/>--Singleton--<br/>';
            echo $product->getCategory()->toString();
        }

        echo '<br/><br/>';

        //FACTORY EXAMPLE
        foreach ($ids as $id) {
            /** @var \Magento\Catalog\Model\Product $product */
            $product = $this->productFactory->create();
            $product = $product->load($id);
            $product->setMyFakeAttribute('produto_sem_singleton');
            echo '<br/>--Factory--<br/>';
            echo $product->getCategory()->toString();
            //var_dump($product);
        }

        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->resultRawFactory->create();
        $resultRaw->setContents('teste');
        return $resultRaw;
    }

}
