<?php

declare(strict_types = 1);

/**
 * Class Maths
 */
class Maths {
    /**
     * @param float $number1
     * @param float $number2
     * @return float|int
     */
    public function multiplication(float $number1, float $number2): float {
        return $number1 * $number2;
    }

    /**
     * @param float $firstNumber
     * @param float $secondNumber
     * @return float
     */
    public function div(float $firstNumber, float $secondNumber) {
        $div = $firstNumber/$secondNumber;
        return ceil($div);
    }
}

/**
 * Class PoolDesign
 */
class PoolDesign {
    const PLATE_HEIGHT = 120; // in mm
    const PLATE_WIDTH = 120; // in mm
    const SPACE = 4; // in mm

    /**
     * @var int
     */
    private $weight;
    /**
     * @var int
     */
    private $height;
    /**
     * @var int
     */
    private $depth;

    /**
     * @var Maths
     */
    private $mathClass;

    /**
     * PoolDesign constructor.
     * @param int $weight
     * @param int $height
     * @param int $depth
     */
    public function __construct(int $weight, int $height, int $depth)
    {
        $this->weight = $weight;
        $this->height = $height;
        $this->depth = $depth;

        $this->mathClass = new Maths();
    }

    /**
     * @return float
     */
    public function index() {
        $plateHeightWithSpace = self::PLATE_HEIGHT + self::SPACE;
        $plateWidthWithSpace = self::PLATE_WIDTH + self::SPACE;

        $poolArea = $this->getWallArea();
        $plateArea = $this->mathClass->multiplication($plateHeightWithSpace, $plateWidthWithSpace);

        $result = $this->mathClass->div($poolArea, $plateArea);

        return $result;
    }

    /**
     * @return float|int
     */
    private function getWallArea() {
        $area = 0;

        $area += $this->mathClass->multiplication($this->weight, $this->height);
        $area += $this->mathClass->multiplication($this->weight, $this->depth) * 2;
        $area += $this->mathClass->multiplication($this->height, $this->depth) * 2;

        return $area;
    }
}

$weight = 100; // in mm
$height = 1000; // in mm
$depth = 1000; // in mm

$pool = new PoolDesign($weight, $height, $depth);
print_r($pool->index());