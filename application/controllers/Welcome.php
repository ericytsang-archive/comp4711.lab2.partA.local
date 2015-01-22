<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Application {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // get the 3 newest images from our model
        $pictures = $this->images->newest();

        // build an array of formatted cells for the pictures
        foreach($pictures as $picture)
        {
            $cells[] = $this->parser->parse('_cell',(array)$picture,true);
        }

        // prime the table class
        $this->load->library('table');
        $params = array(
            'table_open' => '<table class="gallery">',
            'cell_start' => '<td class="oneimage">',
            'cell_alt_start' => '<td class="oneimage">'
            );
        $this->table->set_template($params);

        // generate the table
        $rows = $this->table->make_columns($cells,3);

        // set some data parameters
        $this->data['thetable'] = $this->table->generate($rows);
        $this->data['pagetitle'] = 'Simple Image Gallery';
        $this->data['pagebody'] = 'welcome';

        $this->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
