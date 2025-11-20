<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Home extends MX_Controller
{
    function error()
    {
        $this->oldurl_to_newurl();
        $data['title'] = "Error";
        $data['description'] = "Error Page";
        $data['module'] = "home";
        $data['view_file'] = "error";
        echo Modules::run('template/layout2', $data);
    }
    function index()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['keywords'] = "Packers and Movers, Moving Services, Relocation Services, Household Shifting, Office Relocation, Local Movers, Long-Distance Moving, Home Relocation, Professional Movers, Packing Services, Moving Company, Storage Services, Furniture Movers, Car Transportation, Bike Transportation, Movers Near Me, Best Packers and Movers, Affordable Moving Services, Moving and Packing, Residential Movers, Commercial Movers, $this->comp['company3']), Moving Solutions, Safe Relocation, Logistics Services, Moving Experts, Moving Quotes, Moving Assistance, Reliable Movers, International Moving";
        $data['module'] = "home";
        $data['view_file'] = "home";
        echo Modules::run('template/layout1', $data);
    }
    public function oldurl_to_newurl()
    {
        // if (@$this->uri->segment(1) == "packers-movers-bihar-india") {
        //     redirect("bihar", 'location', 301);
        // }
    }
}
