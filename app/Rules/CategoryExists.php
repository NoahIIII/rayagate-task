<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Category;

class CategoryExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->passes($attribute, $value)) {
            $fail('One or more selected categories do not exist.');
        }
    }
    public function passes($attribute, $value)
    {
        // Check if all category IDs in the array exist in the 'categories' table
        return Category::whereIn('id', $value)->count() === count($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'One or more selected categories do not exist.';
    }
}
