<?php
class OpportunitiesModel{

    private $faker;
    private $config;

    public function __construct($faker)
    {
        $this->faker = $faker;
        $this->config = Config::data();
    }

    /**
     * Create
     */
    public function create()
    {
        $timestamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j")+7, date("Y"));

        $request = array(
            'method' => 'Opportunities.getCurrentIdent',
            'params' => array()
        );
        $response = sellsyconnect_curl::load()->requestApi($request);
        $opp_next = $response->response;

        $request = array(
            'method' => 'Opportunities.create',
            'params' => array(
                'opportunity'   => array(
                    'linkedtype'=> 'prospect',
                    'linkedid'  => $this->config['prospect']['id'],
                    'ident'     => $opp_next,
                    'sourceid'  => $this->config['opportunity']['sourceId'],
                    'name'      => $this->faker->word($nb=3),
                    'funnelid'  => $this->config['opportunity']['funnelId'],
                    'stepid'    => $this->config['opportunity']['stepId'],
                    //'ownerid' => 77097,                                                          // Propriétaire
                    'staffs'    => $this->config['opportunity']['staff'],                          // Collaborateur affecté
                    'contacts'  => implode(',', $this->config['opportunity']['contact']), // Id a récupérer via un Prospects.getOne
                    'dueDate'   => $timestamp,
                    'potential' => 500,
                    'proba'     => 20,
                    'brief'     => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                )
            )
        );

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }
}