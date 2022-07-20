<?php
class MarketingModel{

    private $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }

    /**
     * Create new client (corporation)
     * @param $faker faker instance
     */
    public function create()
    {
        // Source : https://reallygoodemails.com/
        $random = rand(1, 5);
        $numTemplate = str_pad($random, 2, "0", STR_PAD_LEFT);
        $templateEmail = file_get_contents('./emailing/'.$numTemplate.'.php');

        $request = array(
            'method' => 'Marketing.createCampaign',
            'params' => array(
                'campaign' => array(
                    'name'          => 'API - '.date('Ymd_His').' - '.$this->faker->ean13,
                    'type'          => 'email',
                    'segments'      => array(
                        //'savedSearches'   => [],
                        'mailingLists'      => [247], // local:[1], build:[247]
                    ),
                    'includeThirdContacts' => 'N',
                    'fromName'      => $this->faker->firstNameMale." ".$this->faker->name,  //'John DOE',
                    'subject'       => $this->faker->company,                               //'Test lorem ipsum',
                    'fromEmail'     => $this->faker->email,                                 //'contact@tld.com',
                    'editMode'      => 'html',                                              // editor, html
                    'utm' => array(
                        'campaign'  => 'test-lorem-ipsum',
                        'source'    => 'newsletter',
                        'medium'    => 'email'
                    ),
                    // if editMode="html"
                    'content' => array(
                        'html'      => $templateEmail,
                        'text'      => 'Test by Michael'
                    ),
                    //'message' => 'Lorem ipsum pour mon SMS' // SMS only (160 caract)
                )
            )
        );

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }

}
