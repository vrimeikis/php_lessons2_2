<?php

declare(strict_types = 1);

include_once __DIR__.'/Model.php';

/**
 * Class Product
 */
class Product extends Model
{
    protected $table = 'products';

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $slug = '';
    /**
     * @var null|string
     */
    private $description = null;
    /**
     * @var float
     */
    private $price = 0.00;

    /**
     * Product constructor.
     * @param int|null $id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();

        if ($id !== null) {
            $this->fillObject($id);        }
    }

    protected function fillObject(int $id): void
    {
        $data = $this->getById($id);

        $this->setId($data['id']);
        $this->setTitle($data['title']);
        $this->setSlug($data['slug']);
        $this->setDescription($data['description'])
            ->setPrice($data['price']);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Product
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Product
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Product
     */
    public function setDescription(?string $description): Product
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;

        return $this;
    }

    public function save(): void
    {
        // TODO: Implement save() method.
    }

    public function getActive(): array
    {
        // todo: implement getActive() method
    }

}






