<?php


class ProductFactory {
    /**
     * @param string[]|null|false $result
     * @return ProductEntity
     */
    public static function mapFromDatabaseResult($result): ProductEntity {
        $entity = new ProductEntity(
            $result[ProductTableSchema::UID],
            $result[ProductTableSchema::NAME],
            (float) $result[ProductTableSchema::PRICE],
            $result[ProductTableSchema::CREATED_AT],
            $result[ProductTableSchema::UPDATED_AT]
        );
        $entity->setId($result[ProductTableSchema::ID]);
        return $entity;
    }
}
