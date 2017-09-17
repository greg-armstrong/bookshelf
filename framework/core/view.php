<?php

class view
{
    /**
     * Renders the view file selected in the controller.
     * Also allows for the controller to pass variables through to a view.
     */
    public function render($file, $variables = array()) {
        // Turn the array of variables from the controller into seperate variables for easier templating.
        extract($variables);

        // Turn on output buffering to avoid sending data in multiple pieces
        ob_start();

        include VIEW_PATH.$file;

        $renderedView = ob_get_clean();

        // Send templated output to browser
        echo $renderedView;
        exit;
    }
}