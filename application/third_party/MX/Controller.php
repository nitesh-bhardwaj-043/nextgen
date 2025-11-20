<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link    http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright   Copyright (c) 2015 Wiredesignz
 * @version     5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller
{
    public $autoload = array();
    public $comp;
    public $data;
    public function __construct()
    {
        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);

        $this->comp['phone'] = '+919546253098';
        $this->comp['phonehtml'] = 'tel:+91 9546253098';
        $this->comp['supportmail'] = 'support@arshad.in';
        $this->comp['replyToMail'] = 'info@arshad.in';
        $this->comp['mail'] = 'arshadm@gmail.com';
        $this->comp['mailhtml'] = "mailto:arshadm@gmail.com";
        $this->comp['company3'] = 'Groveus';
        $this->comp['companydomain'] = 'groveus.com';

        $this->comp['facebookhtml'] = "";
        $this->comp['youtubehtml'] = "";
        $this->comp['instagramhtml'] = "";
        $this->comp['twitterhtml'] = "";
        $this->comp['linkedinhtml'] = "";
        $this->comp['whatsapphtml'] = "";

        $this->comp['address'] = "<address>1st floor Road No 1 Near Bank of India Ramkrishna Nagar Patna (800027)</address>";
        $this->comp['address1'] = "1st floor Road No 1 Near Bank of India";
        $this->comp['address2'] = "Ramkrishna Nagar Patna";
        $this->comp['addressRegion'] = "Patna";
        $this->comp['postalCode'] = "800027";
        $this->comp['companystate'] = "Bihar";
        $this->comp['themeColor'] = "#e21b22";

        $this->comp['sku'] = "PM28957";
        $this->comp['mpn'] = "JPM28957";
        // Review
        $this->comp['ratingValue'] = "4.8";
        $this->comp['ratingCount'] = "1839";
        $this->comp['datePublished'] = "15 july, 2024";
        $this->comp['reviewBody'] = "Jay Packers provided excellent service with their IBA-approved goods insurance. My items were securely moved, affordable, and stress-free.";
        $this->comp['reviewperson'] = "Arshad Ali";

        /* autoload module items */
        $this->load->_autoloader($this->autoload);
    }

    public function __get($class)
    {
        return CI::$APP->$class;
    }
}
