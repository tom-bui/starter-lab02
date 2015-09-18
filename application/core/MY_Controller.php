<?php

class Application extends CI_Controller {
   
    protected $data = array();  // parameters for view components
    protected $id;  // identifier for our content
    protected $choices = array(
      'Home' => '/', 'Gallery' => '/gallery', 'About' => '/about'  
    );
    
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Sample Image Gallery';
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('template', $this->data);
    }
}
