<?php
class CatalogueModel{

    private $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }

    /**
     * Create
     */
    public function create()
    {
        $request = [
            'method' => 'Catalogue.create',
            'params' => [
                'type' => 'item',
                'item' => [
                    'name'       => 'Lorem ipsum '.uniqid(),
                    'taxrate'    => '20,00',
                    'unit'       => 'g',
                    'unitAmount' => '150.75',
                ]
            ]
        ];

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }

}