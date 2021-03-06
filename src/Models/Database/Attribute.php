<?php

namespace AvoRed\Framework\Models\Database;

use AvoRed\Framework\Models\Traits\TranslatedAttributes;
use Illuminate\Support\Collection;

class Attribute extends BaseModel
{

    use TranslatedAttributes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'identifier'];

    /**
     * The attributes that are translatable assignable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name', 'identifier'];

    /**
     * Attribute Model has many translation values 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function translations()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    /**
     * The attributes has Many Dropdown Options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeDropdownOptions()
    {
        return $this->hasMany(AttributeDropdownOption::class);
    }
    /**
     * The attributes has Many Dropdown Options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeTranslations()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    /**
     * The attributes has Many Products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get name of an attribute
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->getAttribute('name', $translated = true);
    }
    /**
     * Get identifier of an attribute
     *
     * @return string $identifier
     */
    public function getIdentifier()
    {
        return $this->getAttribute('identifier', $translated = true);
    }

    /**
     * Get dropdown options with language transted
     * @return \Illuminate\Support\Collection $options
     */
    public function getDropdownOptions()
    {
        $options = Collection::make([]);

        $dropdowns = $this->attributeDropdownOptions;
        if (null !== $dropdowns && $dropdowns->count() > 0) {
            foreach ($dropdowns as $dropdown) {
                $dropdown->display_text = $dropdown->getDisplayText();
                $options->push($dropdown);
            }
        }

        return $options;
    }
}
