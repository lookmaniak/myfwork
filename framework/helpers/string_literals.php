<?php

function class_to_table_name($className) {
    $snakeCase = strtolower(preg_replace('/(?<!^)(?=[A-Z])/', '_', $className));

    $baseName = rtrim($snakeCase, 's'); 

    if (substr($baseName, -1) === 'y' && !preg_match('/[aeiou]y$/', $baseName)) {
        return substr($baseName, 0, -1) . 'ies';
    } elseif (substr($baseName, -1) === 's' || substr($baseName, -1) === 'x' || preg_match('/(ch|sh)$/', $baseName)) {
        return $snakeCase . 'es';
    }

    return $snakeCase . 's';
}

function create_excerpt_by_words($content, $max_words = 20, $append_ellipsis = true) {
    $words = explode(' ', $content);

    if (count($words) > $max_words) {
        $words = array_slice($words, 0, $max_words);
        $excerpt = implode(' ', $words);
        if ($append_ellipsis) {
            $excerpt .= '...';
        }
    } else {
        $excerpt = implode(' ', $words);
    }

    return $excerpt;
}
