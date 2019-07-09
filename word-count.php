<?php

/**
 * @param string $text
 * @return array|string
 */
function wordCount(string $text)
{
    $parsedText = preg_replace('/[!@#$%^&*()]+/', '', strtolower($text));
    if (strlen(trim($parsedText)) === 0) {
        return '';
    }
    return array_count_values(explode(' ', $parsedText));
}