<?php
function tag($input, $content = '') {
    preg_match('/^([a-zA-Z0-9-]+)(#[a-zA-Z0-9_-]+)?(\.[a-zA-Z0-9_.-]+)*(\[.*\])?$/', $input, $matches);

    if (!isset($matches[1])) {
        return "Invalid input, missing tag name.";
    }

    $tagName = $matches[1];

    $id = isset($matches[2]) ? 'id="' . substr($matches[2], 1) . '" ' : '';

    $classes = '';
    if (isset($matches[3])) {
        $classList = explode('.', substr($matches[3], 1)); 
        $classes = 'class="' . implode(' ', $classList) . '" ';
    }

    $attributes = '';
    if (isset($matches[4])) {
        preg_match_all('/\[([a-zA-Z0-9_-]+)=["\']([^"\']+)["\']\]/', $matches[4], $attrMatches);
        foreach ($attrMatches[1] as $key => $attrName) {
            $attributes .= "{$attrName}=\"{$attrMatches[2][$key]}\" ";
        }
    }

    $attributes = $id . $classes . $attributes;
    $tag = "<{$tagName} {$attributes}>";

    if (is_array($content)) {
        $content = implode('', array_map(function($item) {
            return is_object($item) && method_exists($item, 'render') ? $item->render() : (string) $item;
        }, $content));
    }

    return $tag . $content . "</{$tagName}>";
}
