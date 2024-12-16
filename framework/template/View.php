<?php

class View {
    protected function html($content) {
        echo "<html>" . $this->flattenArray($content) . "</html>";
    }

    private function flattenArray($content) {
        $output = '';
        foreach ($content as $item) {
            if (is_array($item)) {
                $output .= $this->flattenArray($item);
            } else {
                $output .= $item;
            }
        }
        return $output;
    }
}