<?php

class MY_Controller extends CI_Controller {

    protected $data = array();
    protected $author_info = array();
    protected $page_languages = array('vi', 'en');
    protected $langAbbreviation = 'vi';

    function __construct() {
        parent::__construct();
        
        $this->data['page_title'] = 'Template';
        $this->data['before_head'] = '';
        $this->data['before_body'] = '';
    }

    protected function render($the_view = NULL, $template = 'master') {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->data['lang'] = $this->langAbbreviation;
            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }

    protected function pagination_config($base_url, $total_rows, $per_page, $uri_segment,$next = 'Trước',$prev = 'Sau',$last = 'Cuôi',$first = 'Đầu') {
        $config['base_url'] = $base_url;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['prev_link'] = $prev;
        $config['next_link'] = $next;
        $config['last_link'] = $last;
        $config['first_link'] = $first;
        $config['total_rows'] = $total_rows;
        $config['reuse_query_string'] = true;
        $config ['reuse_query_string'] = true;
        return $config;
    }
    protected function str_slug($value='',$separator='-'){
        $new_array = explode('.', $value);
        $typeimg = array_pop($new_array);
        $nameimg = str_replace(".".$typeimg, "", $value);
        $charsArray = [
            '0'    => ['°', '₀', '۰'],
            '1'    => ['¹', '₁', '۱'],
            '2'    => ['²', '₂', '۲'],
            '3'    => ['³', '₃', '۳'],
            '4'    => ['⁴', '₄', '۴', '٤'],
            '5'    => ['⁵', '₅', '۵', '٥'],
            '6'    => ['⁶', '₆', '۶', '٦'],
            '7'    => ['⁷', '₇', '۷'],
            '8'    => ['⁸', '₈', '۸'],
            '9'    => ['⁹', '₉', '۹'],
            'a'    => ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å', 'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ', 'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά', 'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ', 'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا'],
            'b'    => ['б', 'β', 'Ъ', 'Ь', 'ب', 'ဗ', 'ბ'],
            'c'    => ['ç', 'ć', 'č', 'ĉ', 'ċ'],
            'd'    => ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ', 'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ'],
            'e'    => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ', 'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э', 'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ'],
            'f'    => ['ф', 'φ', 'ف', 'ƒ', 'ფ'],
            'g'    => ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ'],
            'h'    => ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ'],
            'i'    => ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į', 'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ', 'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ', 'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი', 'इ'],
            'j'    => ['ĵ', 'ј', 'Ј', 'ჯ', 'ج'],
            'k'    => ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ', 'ک'],
            'l'    => ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ'],
            'm'    => ['м', 'μ', 'م', 'မ', 'მ'],
            'n'    => ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ'],
            'o'    => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő', 'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό', 'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ'],
            'p'    => ['п', 'π', 'ပ', 'პ', 'پ'],
            'q'    => ['ყ'],
            'r'    => ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ'],
            's'    => ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს'],
            't'    => ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ'],
            'u'    => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ', 'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ'],
            'v'    => ['в', 'ვ', 'ϐ'],
            'w'    => ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ'],
            'x'    => ['χ', 'ξ'],
            'y'    => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ', 'ϋ', 'ύ', 'ΰ', 'ي', 'ယ'],
            'z'    => ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ'],
            'aa'   => ['ع', 'आ', 'آ'],
            'ae'   => ['ä', 'æ', 'ǽ'],
            'ai'   => ['ऐ'],
            'at'   => ['@'],
            'ch'   => ['ч', 'ჩ', 'ჭ', 'چ'],
            'dj'   => ['ђ', 'đ'],
            'dz'   => ['џ', 'ძ'],
            'ei'   => ['ऍ'],
            'gh'   => ['غ', 'ღ'],
            'ii'   => ['ई'],
            'ij'   => ['ĳ'],
            'kh'   => ['х', 'خ', 'ხ'],
            'lj'   => ['љ'],
            'nj'   => ['њ'],
            'oe'   => ['ö', 'œ', 'ؤ'],
            'oi'   => ['ऑ'],
            'oii'  => ['ऒ'],
            'ps'   => ['ψ'],
            'sh'   => ['ш', 'შ', 'ش'],
            'shch' => ['щ'],
            'ss'   => ['ß'],
            'sx'   => ['ŝ'],
            'th'   => ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
            'ts'   => ['ц', 'ც', 'წ'],
            'ue'   => ['ü'],
            'uu'   => ['ऊ'],
            'ya'   => ['я'],
            'yu'   => ['ю'],
            'zh'   => ['ж', 'ჟ', 'ژ'],
            '(c)'  => ['©'],
            'A'    => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą', 'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ', 'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ', 'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ'],
            'B'    => ['Б', 'Β', 'ब'],
            'C'    => ['Ç', 'Ć', 'Č', 'Ĉ', 'Ċ'],
            'D'    => ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ'],
            'E'    => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ', 'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э', 'Є', 'Ə'],
            'F'    => ['Ф', 'Φ'],
            'G'    => ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ'],
            'H'    => ['Η', 'Ή', 'Ħ'],
            'I'    => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į', 'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ', 'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ'],
            'K'    => ['К', 'Κ'],
            'L'    => ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल'],
            'M'    => ['М', 'Μ'],
            'N'    => ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν'],
            'O'    => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő', 'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ', 'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ'],
            'P'    => ['П', 'Π'],
            'R'    => ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ'],
            'S'    => ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ'],
            'T'    => ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ'],
            'U'    => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ', 'Ǘ', 'Ǚ', 'Ǜ'],
            'V'    => ['В'],
            'W'    => ['Ω', 'Ώ', 'Ŵ'],
            'X'    => ['Χ', 'Ξ'],
            'Y'    => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ', 'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ'],
            'Z'    => ['Ź', 'Ž', 'Ż', 'З', 'Ζ'],
            'AE'   => ['Ä', 'Æ', 'Ǽ'],
            'CH'   => ['Ч'],
            'DJ'   => ['Ђ'],
            'DZ'   => ['Џ'],
            'GX'   => ['Ĝ'],
            'HX'   => ['Ĥ'],
            'IJ'   => ['Ĳ'],
            'JX'   => ['Ĵ'],
            'KH'   => ['Х'],
            'LJ'   => ['Љ'],
            'NJ'   => ['Њ'],
            'OE'   => ['Ö', 'Œ'],
            'PS'   => ['Ψ'],
            'SH'   => ['Ш'],
            'SHCH' => ['Щ'],
            'SS'   => ['ẞ'],
            'TH'   => ['Þ'],
            'TS'   => ['Ц'],
            'UE'   => ['Ü'],
            'YA'   => ['Я'],
            'YU'   => ['Ю'],
            'ZH'   => ['Ж'],
            ' '    => ["\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81", "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84", "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87", "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A", "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80"],
        ];
        foreach ($charsArray as $key => $val) {
            $nameimg = str_replace($val, $key, $nameimg);
        }
        $title = preg_replace('/[^\x20-\x7E]/u', '', $nameimg);
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        return trim($title.'.'.$typeimg, $separator);
    }

    protected function upload_image($image_input_id, $image_name, $upload_path, $upload_thumb_path, $thumbs_with = 500, $thumbs_height = 375) {
        $image = '';
        if (!empty($image_name)) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $this->str_slug($image_name);
            // $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload($image_input_id)) {
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                $config_thumb['source_image'] = $upload_path . '/' . $image;
                $config_thumb['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['new_image'] = $upload_thumb_path;
                $config_thumb['width'] = $thumbs_with;
                $config_thumb['height'] = $thumbs_height;

                $this->load->library('image_lib', $config_thumb);

                $this->image_lib->resize();
            }
        }

        return $image;
    }

    protected function upload_multiple_image($upload_path = '', $file_name = '', $upload_thumb_path = '', $thumbs_with = 500, $thumbs_height = 500) {
        $config = $this->config_file($upload_path);

        $image = '';
        $file = $_FILES[$file_name];
        $count = count($file['name']);
        $image_list = array();
        $config_thumb = array();

        for ($i = 0; $i < $count; $i++) {

            $_FILES['userfile']['name'] = $this->str_slug($file['name'][$i]);
            $_FILES['userfile']['type'] = $file['type'][$i];
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
            $_FILES['userfile']['error'] = $file['error'][$i];
            $_FILES['userfile']['size'] = $file['size'][$i];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                $image_list[] = $data['file_name'];
                $image = $data['file_name'];

                $this->load->library('image_lib');

                $config['image_library'] = 'gd2';
                $config_thumb['source_image'] = $upload_path . '/' . $image;
                $config_thumb['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['new_image'] = $upload_thumb_path;
                $config_thumb['width'] = $thumbs_with;
                $config_thumb['height'] = $thumbs_height;

                $this->image_lib->initialize($config_thumb);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $this->image_lib->resize($image);
                
            }
        }
        return $image_list;
    }

    function config_file($upload_path = '') {
        $config = array();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1200';
        // $config['encrypt_name'] = TRUE;
//        $config['max_width']     = '1028';
//        $config['max_height']    = '1028';
        return $config;
    }

    protected function delete_multiple_common($table, $model, $ids){
        $this->load->model($model);

        $data = array();
        foreach($ids as $key => $id){
            $data[$key] = array(
                'id' => $id,
                'is_deleted' => 1
            );
        }

        $result = $this->$model->remove_multiple($table, $data);

        if($result == false){
            $this->output->set_status_header(404)
                ->set_output(json_encode(array('message' => 'Fail', 'data' => $ids)));
        }else{
            $this->output->set_status_header(200)
                ->set_output(json_encode(array('message' => 'Success', 'data' => $ids)));
        }
    }
    function return_api($status, $message='', $data = null,$isExisted= true){
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode(array('status' => $status,'message' => $message , 'reponse' => $data, 'isExisted' => $isExisted)));
    }

}

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_languages'] = array('vi' => 'Tiếng Việt', 'en' => 'English');
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in() || $this->ion_auth->is_admin()===FALSE) {
            //redirect them to the login page
            redirect('admin/user/login', 'refresh');
        }
        $this->data['page_title'] = 'Administrator area';

        // Set timezone
        date_default_timezone_set('Europe/Budapest');

        // Insert author informations to database when insert, update or delete
        $this->author_info = array(
            'created' => date('Y-m-d H:i:s', now()),
            'created_by' => $this->ion_auth->user()->row()->username,
            'modified' => date('Y-m-d H:i:s', now()),
            'modified_by' => $this->ion_auth->user()->row()->username
        );
    }

    protected function upload_file($upload_path = '', $file_name = '', $upload_thumb_path = '', $thumbs_with = 500, $thumbs_height = 500) {
        $config = $this->config_file($upload_path);
        $image = '';
        $file = $_FILES[$file_name];
        $count = count($file['name']);
        $image_list = array();
        $config_thumb = array();
        for ($i = 0; $i < $count; $i++) {
            $_FILES['userfile']['name'] = $this->str_slug($file['name'][$i]);
            $_FILES['userfile']['type'] = $file['type'][$i];
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
            $_FILES['userfile']['error'] = $file['error'][$i];
            $_FILES['userfile']['size'] = $file['size'][$i];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $data = $this->upload->data();
                $image_list[] = $data['file_name'];
                $image = $data['file_name'];
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config_thumb['source_image'] = $upload_path . '/' . $image;
                $config_thumb['create_thumb'] = TRUE;
                $config_thumb['maintain_ratio'] = TRUE;
                $config_thumb['new_image'] = $upload_thumb_path;
                $config_thumb['width'] = $thumbs_with;
                $config_thumb['height'] = $thumbs_height;
                $this->image_lib->initialize($config_thumb);
                $this->image_lib->resize();
                $this->image_lib->clear();
                $this->image_lib->resize($image);
            }
        }
        return $image_list;
    }

    function config_file($upload_path = '') {
        $config = array();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1200';
        // $config['encrypt_name'] = TRUE;
//        $config['max_width']     = '1028';
//        $config['max_height']    = '1028';

        return $config;
    }

    protected function render($the_view = NULL, $template = 'admin_master') {
        parent::render($the_view, $template);
    }

}

class Public_Controller extends MY_Controller {

    protected $sub_international_category = array();

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('ion_auth');
        $this->load->model('product_category_model');
        $this->load->model('product_model');
        $this->load->model('post_category_model');
        $this->load->model('post_model');
        $this->load->model('localtion_model');
        $this->langAbbreviation = $this->session->userdata('langAbbreviation') ? $this->session->userdata('langAbbreviation') : 'vi';

        if($this->langAbbreviation == 'vi' || $this->langAbbreviation == 'en' || $this->langAbbreviation == ''){
            $this->session->set_userdata('langAbbreviation', $this->langAbbreviation);
        }
        
        if($this->session->userdata('langAbbreviation') == 'vi' || $this->session->userdata('langAbbreviation') == ''){
            $langName = 'vietnamese';
            $this->config->set_item('language', $langName); 
            $this->session->set_userdata("langAbbreviation",'vi');
            $this->lang->load('vietnamese_lang', 'vietnamese');
        }
        
        if($this->session->userdata('langAbbreviation') == 'en'){
            $langName = 'english';
            $this->config->set_item('language', $langName); 
            $this->session->set_userdata("langAbbreviation",'en');
            $this->lang->load('english_lang', 'english');
        }
        $this->data['domestic_menu'] = $this->fetch_menu_categories(FIXED_DOMESTIC_CATEGORY_ID);
        $this->data['international_menu'] = $this->fetch_menu_categories(FIXED_INTERNATIONAL_CATEGORY_ID);
        $this->data['mice_menu'] = $this->post_category_model->get_by_id(FIXED_MICE,array('title','content'),$this->session->userdata('langAbbreviation'),0);
        $this->data['mice_menu']['sub'] = $this->post_category_model->get_by_parent_id(FIXED_MICE,'desc',$this->session->userdata('langAbbreviation'),0,4);
        $this->data['service_menu'] = $this->post_category_model->get_by_id(FIXED_SERVICE,array('title','content'),$this->session->userdata('langAbbreviation'),0);
        $this->data['service_menu']['sub'] = $this->post_category_model->get_by_parent_id(FIXED_SERVICE,'desc',$this->session->userdata('langAbbreviation'),0,2);
        $this->data['blog_menu'] = $this->post_category_model->get_by_id(FIXED_BLOG,array('title','content'),$this->session->userdata('langAbbreviation'),0);
        $this->data['blog_menu']['sub'] = $this->post_category_model->get_by_parent_id(FIXED_BLOG,'desc',$this->session->userdata('langAbbreviation'),0,2);
        $this->data['visa_menu'] = $this->post_category_model->get_by_id(FIXED_VISA,array('title','content'),$this->session->userdata('langAbbreviation'),0);
        $this->data['visa_menu']['sub'] = $this->post_category_model->get_by_parent_id(FIXED_VISA,'desc',$this->session->userdata('langAbbreviation'),0,2);
        $this->data['location'] = $this->localtion_model->get_all_with_pagination_searchs('desc', $this->session->userdata('langAbbreviation'), 3, 0);
        $this->data['controller'] = $this;
    }

    public function fetch_menu_categories($parent){
        return $this->product_category_model->fetch_menu_categories($parent, $this->session->userdata('langAbbreviation'));
    }

    public function fetch_tour_by_category($category_id){
        return $this->product_model->fetch_tour_by_category($category_id, $this->session->userdata('langAbbreviation'));
    }

    public function receive_category_data($parent){
        $this->sub_international_category = array();
        array_push($this->sub_international_category, $parent);
        $this->get_international_data($parent);
        return $this->product_model->get_tours_in_array_category_id($this->sub_international_category, $this->session->userdata('langAbbreviation'));
    }

    public function get_international_data($parent){
        $categories = $this->product_category_model->fetch_product_category_menu($parent);

        if($categories){
            foreach ($categories as $key => $category)
            {
                array_push($this->sub_international_category, $category['id']);
                $this->get_international_data($category['id']);
            }
        }
    }

    protected function render($the_view = NULL, $template = 'master') {
        parent::render($the_view, $template);
    }

}
