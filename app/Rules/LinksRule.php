<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LinksRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $array = json_decode($value, true);
        if (!is_array($array)) {
            $fail("The provided links are invalid.");
            return;
        }
        if (count($array) <= 0) {
            $fail("At least one link is required.");
            return;
        }
        if (count($array) > 5) {
            $fail("No more than 5 links permitted.");
            return;
        }
        $error = false;
        foreach ($array as $link) {
            if ($link["type"] !== "document" && $link["type"] !== "video") $error = true;
            if (!filter_var($link["link"], FILTER_VALIDATE_URL)) $error = true;
        }
        if ($error) {
            $fail("One or more links are invalid.");
        }
    }
}
