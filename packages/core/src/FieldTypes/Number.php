<?php

namespace GetCandy\FieldTypes;

use GetCandy\Base\FieldType;
use GetCandy\Exceptions\FieldTypeException;

class Number implements FieldType
{
    /**
     * @var int|float
     */
    protected $value;

    /**
     * Create a new instance of Number field type.
     *
     * @param  int|float  $value
     */
    public function __construct($value = 0)
    {
        $this->setValue($value);
    }

    /**
     * Return the value of this field.
     *
     * @return int|float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of this field.
     *
     * @param  int|float  $value
     */
    public function setValue($value)
    {
        if (! is_numeric($value)) {
            throw new FieldTypeException(self::class.' value must be numeric.');
        }

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel(): string
    {
        return __('adminhub::fieldtypes.number.label');
    }

    /**
     * {@inheritDoc}
     */
    public function getSettingsView(): string
    {
        return 'adminhub::field-types.number.settings';
    }

    /**
     * {@inheritDoc}
     */
    public function getView(): string
    {
        return 'admihub::field-types.number.view';
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(): array
    {
        return [
            'view'    => 'adminhub::field-types.number',
            'options' => [
                'min' => 'numeric,min:1',
                'max' => 'numeric,max:255',
            ],
        ];
    }
}
