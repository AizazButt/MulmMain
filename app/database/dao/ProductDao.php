<?php

class ProductDao extends TableDao {


    public function __construct(mysqli $connection) { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        parent::__construct($connection);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function insertProduct(ProductEntity $productEntity): ?ProductEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::INSERT)
            ->withTableName(ProductEntity::TABLE_NAME)
            ->columns([
                ProductTableSchema::UID,
                ProductTableSchema::NAME,
                ProductTableSchema::PRICE,
                ProductTableSchema::CREATED_AT,
                ProductTableSchema::UPDATED_AT
            ])
            ->values([
                $this->escape_string($productEntity->getUid()),
                $this->escape_string($productEntity->getName()),
                $this->escape_string($productEntity->getPrice()),
                $this->escape_string($productEntity->getCreatedAt()),
                $this->escape_string($productEntity->getUpdatedAt())
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getProductWithId($this->inserted_id());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getProductWithId(string $id): ?ProductEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ProductEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [ProductTableSchema::ID, '=', $this->escape_string($id)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return ProductFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getProductWithUid(string $uid): ?ProductEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ProductEntity::TABLE_NAME)
             ->columns(['*'])
             ->whereParams([
                [ProductTableSchema::UID, '=', $this->escape_string($uid)]
             ])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return ProductFactory::mapFromDatabaseResult(mysqli_fetch_assoc($result));
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function getAllProduct(): array { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::SELECT)
             ->withTableName(ProductEntity::TABLE_NAME)
             ->columns(['*'])
             ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        $products = [];

        while($row = mysqli_fetch_assoc($result)) {
            array_push($products, ProductFactory::mapFromDatabaseResult($result));
        }
        return $products;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function updateProduct(ProductEntity $productEntity): ?ProductEntity { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::UPDATE)
            ->withTableName(ProductEntity::TABLE_NAME)
            ->updateParams([
                [ProductTableSchema::NAME, $this->escape_string($productEntity->getName())],
                [ProductTableSchema::PRICE, $this->escape_string($productEntity->getPrice())],
                [ProductTableSchema::CREATED_AT, $this->escape_string($productEntity->getCreatedAt())],
                [ProductTableSchema::UPDATED_AT, $this->escape_string($productEntity->getUpdatedAt())]
            ])
            ->whereParams([
                [ProductTableSchema::ID, '=', $this->escape_string($productEntity->getId())]
            ])
            ->generate();

        $result = mysqli_query($this->getConnection(), $query);

        if ($result) {
            return $this->getProductWithId($productEntity->getId());
        }
        return null;
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteProduct(ProductEntity $productEntity): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(ProductEntity::TABLE_NAME)
            ->whereParams([
                [ProductTableSchema::ID, '=', $this->escape_string($productEntity->getId())]
            ])
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

    public function deleteAllProducts(): bool { // <***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>
        $query = QueryBuilder::withQueryType(QueryType::DELETE)
            ->withTableName(ProductEntity::TABLE_NAME)
            ->generate();

        return (bool) mysqli_query($this->getConnection(), $query);
    } // </***_ELECTRO_GENERATED_DO_NOT_REMOVE_***>

}
