<p align="center">
  <a href="http://www.aropixel.com/">
    <img src="https://avatars1.githubusercontent.com/u/14820816?s=200&v=4" alt="Aropixel logo" width="75" height="75" >
  </a>
</p>

## Aropixel Sylius Stock Movement Plugin

Log and display the product stock movements. When the stock of a product is updated, the stock movement will be saved 
and displayed in the admin product stock tab. The origin of the stock update is also displayed (either a new order or a manual update).

## Installation

- Install this plugin using composer : 

```bash
composer require aropixel/sylius-stock-movement-plugin
```

- import the plugin config in a new "aropixel_sylius_stock_movement.yaml" file inside 'config/packages':

```yaml
imports:
    - { resource: "@AropixelSyliusStockMovementPlugin/Resources/config/app/config.yml" }
```

- Add the StockMovement interface and trait to your ProductVariant entity: 

```php
    ...
    
    namespace App\Entity\Product;

    ...
    
    use Aropixel\SyliusStockMovementPlugin\Entity\ProductVariantMovementInterface;
    use Aropixel\SyliusStockMovementPlugin\Entity\ProductVariantMovementTrait;
    ... 
    
    /**
     * @ORM\Entity
     * @ORM\Table(name="sylius_product_variant")
     */
    class ProductVariant extends BaseProductVariant implements ProductVariantMovementInterface
    {
        use ProductVariantMovementTrait;

    ...
```

- Generate and execute the db migrations

## Screenshots


![Screenshot](screenshot.png)
