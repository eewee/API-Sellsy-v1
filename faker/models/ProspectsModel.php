<?php
class ProspectsModel{

    private $faker;
    private $config;

    public function __construct($faker)
    {
        $this->faker = $faker;
        $this->config = Config::data();
    }

    /**
     * Create
     * @param $type person, corporation
     */
    public function create($type="corporation")
    {
        $request = array(
            'method' => 'Prospects.create',
            'params' => array(
                'third' => array(
                    'name'            => $this->faker->company.' '.$this->faker->companySuffix,
                    'ident'           => $this->faker->ean13, // or uuid
                    'type'            => $type, // person, corporation
                    'vat'             => $this->faker->vat,
                    'siret'           => $this->faker->siret,         // FR only
                    'siren'           => $this->faker->siren,         // FR only
                    //'rcs'           => '',
                    'capital'         => $this->faker->randomNumber($nbDigits = 7, $strict = false),
                    'email'           => $this->faker->email,
                    'tel'             => $this->faker->phoneNumber,   // FR only
                    'fax'             => $this->faker->serviceNumber, // FR only
                    'mobile'          => $this->faker->mobileNumber,  // FR only
                    'web'             => $this->faker->domainName,
                    'rateCategory'    => $this->config['client']['rateCategory'],
                    'massmailingUnsubscribed'       => 'N',
                    'massmailingUnsubscribedSMS'    => 'N',
                    'phoningUnsubscribed'           => 'N',
                    'massmailingUnsubscribedMail'   => 'N',
                    'massmailingUnsubscribedCustom' => 'N',
                    'tags'            => 'api, michael',
                    'stickyNote'    => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'facebook'        => 'https://fr-fr.facebook.com/'.$this->faker->userName,
                    'viadeo'          => 'https://fr.viadeo.com/fr/company/'.$this->faker->userName,
                    'linkedin'        => 'https://fr.linkedin.com/company/'.$this->faker->userName,
                    'twitter'         => 'https://twitter.com/'.$this->faker->userName,
                ),
                'contact' => array(
                    'civil'           => $this->faker->randomElement($array = array ('man','woman','lady')),
                    'name'            => $this->faker->name,
                    'forename'        => $this->faker->firstNameMale,
                    'email'           => $this->faker->userName."@mailinator.com",
                    'mcoptin'         => 'N',
                    'mjoptin'         => 'Y',
                    'smoptin'         => 'Y',
                    'tel'             => $this->faker->phoneNumber,   // FR only
                    'fax'             => $this->faker->serviceNumber, // FR only
                    'mobile'          => $this->faker->mobileNumber,  // FR only
                    'massmailingUnsubscribed'       => 'N',
                    'massmailingUnsubscribedSMS'    => 'N',
                    'phoningUnsubscribed'           => 'N',
                    'massmailingUnsubscribedMail'   => 'N',
                    'massmailingUnsubscribedCustom' => 'N',
                    //'birthdate' => 1510527600,
                    'tags'            => 'api, michael',
                    'position'        => $this->faker->jobTitle,
                    'web'             => $this->faker->domainName,
                    'facebook'        => 'https://fr-fr.facebook.com/'.$this->faker->userName,       // not disponible
                    'viadeo'          => 'https://fr.viadeo.com/fr/company/'.$this->faker->userName, // not disponible
                    'linkedin'        => 'https://fr.linkedin.com/company/'.$this->faker->userName,  // not disponible
                    'twitter'         => 'https://twitter.com/'.$this->faker->userName,              // not disponible
                ),
                'address' => array(
                    'name'        => 'Bureau',
                    'part1'       => $this->faker->streetAddress,
                    'part2'       => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                    'part3'       => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                    'part4'       => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                    'zip'         => $this->faker->postcode,
                    'town'        => $this->faker->city,
                    'countrycode' => 'FR',
                )
            )
        );

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }

}