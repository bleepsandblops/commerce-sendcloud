<?php

namespace white\commerce\sendcloud\models;

use craft\helpers\ArrayHelper;
use InvalidArgumentException;

final class ParcelItem
{
    /** @var string */
    public string $description;

    /** @var int */
    public int $quantity;

    /** @var string */
    public string $weight;

    /** @var string */
    public string $sku;

    /** @var string */
    public string $value;

    /** @var string */
    public string $hsCode;

    /** @var string */
    public string $originCountry;

    /**
     * ParcelItem constructor.
     * @param array $parcelItemParams
     * @throws \Exception
     */
    public function __construct(array $parcelItemParams)
    {
        if (null === $this->description = ArrayHelper::getValue($parcelItemParams, 'description')) {
            throw new InvalidArgumentException('Key "description" not found');
        }

        if (null === $this->quantity = ArrayHelper::getValue($parcelItemParams, 'quantity')) {
            throw new InvalidArgumentException('Key "quantity" not found');
        }

        if (null === $this->weight = ArrayHelper::getValue($parcelItemParams, 'weight')) {
            throw new InvalidArgumentException('Key "weight" not found');
        }

        if (null === $this->sku = ArrayHelper::getValue($parcelItemParams, 'sku')) {
            throw new InvalidArgumentException('Key "sku" not found');
        }

        if (null === $this->value = ArrayHelper::getValue($parcelItemParams, 'value')) {
            throw new InvalidArgumentException('Key "value" not found');
        }

        $this->hsCode = ArrayHelper::getValue($parcelItemParams, 'hsCode');
        $this->originCountry = ArrayHelper::getValue($parcelItemParams, 'originCountry');
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'description' => $this->description,
            'quantity' => $this->quantity,
            'weight' => $this->weight,
            'sku' => $this->sku,
            'value' => $this->value,
        ];
        
        if (!empty($this->hsCode)) {
            $data['hs_code'] = $this->hsCode;
        }
        
        if (!empty($this->originCountry)) {
            $data['origin_country'] = $this->originCountry;
        }
        
        return $data;
    }
}
