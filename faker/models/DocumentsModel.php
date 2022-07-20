<?php
class DocumentsModel{

    private $faker;
    private $config;

    public function __construct($faker)
    {
        $this->faker = $faker;
        $this->config = Config::data();
    }

    /**
     * Create new doc (estimate, invoice)
     * @param $faker faker instance
     * @param $typeDoc invoice or estimate
     */
    function create($typeDoc="invoice")
    {
        $request = [
            'method' => 'Document.create',
            'params' => [
                'document' => [
                    'doctype'   => $typeDoc,
                    'thirdid'   => $this->config['client']['id'],
                    'contactid' => $this->config['client']['idContact'],
                    //'ident'     => 'doc_'.date('Ymd_His').'_'.uniqid(),
                    'subject'   => $this->faker->word($nb=3),
                    'notes'     => $this->faker->text,
                ],
                'row' => [
//                    [
//                        "row_type"           => "item",
//                        "row_linkedid"       => "8306097",
//                        "row_name"           => "API - test ".date('YmdHis'),
//                        "row_notes"          => "Lorem ipsum note",
//                        "row_taxid"          => "3825403",
//                        "row_unit"           => "unité",
//                        "row_unitAmount"     => 31.9123,
//                        "row_qt"             => 1,
//                        "row_purchaseAmount" => 15.25
//                    ],
                    [
                        'row_type'   => 'once',
                        'row_name'   => 'mon nom',
                        'row_notes'  => 'ma note',
                        'row_qt'     => 10,
                        'row_unit'   => 'g',
                        'row_unitAmount' => 50,
                        'row_taxid'  => $this->config['document']['taxid'],
                    ],
                    [
                        'row_type'     => 'title',
                        'row_title'    => $this->faker->word($nb=3),
                    ],
                    [
                        'row_type'     => 'comment',
                        'row_comment'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    ],
                ]
            ]
        ];

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        // Transfert > facture "Brouillon" en "A regler".
        if (isset($response->response->doc_id) && !empty($response->response->doc_id)) {
            $idDoc = $response->response->doc_id;
            $request2 = [
                'method' => 'Document.validate',
                'params' => [
                    'docid' => $idDoc,
                    //'date'  => {{date timestamp}}
                ],
            ];
            $response2 = sellsyconnect_curl::load()->requestApi($request2);
            // echo '<pre>'.var_export($response2, true).'</pre>';
            // echo '<hr>';
        }

        return $response;
    }

}