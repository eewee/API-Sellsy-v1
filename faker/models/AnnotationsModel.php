<?php
class AnnotationsModel{

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
        $request =  array(
            'method' => 'Annotations.create',
            'params' => array(
                'annotation' => array(
                    //'parentid'  => {{parentid}},
                    'relatedtype' => 'third',  // estimate, opportunity - 'dashboard', 'item', 'estimate', 'creditnote', 'order', 'delivery', 'proforma', 'invoice', 'third', 'people', 'purOrder', 'purDelivery', 'purInvoice', 'purCreditNote', 'delivery', 'opportunity', 'task'
                    'relatedid'   => $this->config['client']['id'],
                    'text'        => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                    //'date'      => {{date}}
                )
            )
        );

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }
}