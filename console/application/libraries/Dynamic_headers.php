<?php
/**
 *
 * Dynmic_menu.php
 *
 */
class Dynamic_headers {

    private $ci;                // for CodeIgniter Super Global Reference.


    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }


    function todal_stores()
    {
        $this->db->select('*');
        $this->db->from('pz_store_settin');
        $this->ci->db->where('st_activeStatus','1');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

   
}