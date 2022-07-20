<?php
class PeoplesModel{

    private $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }

    /**
     * Create new contact
     * @param $faker faker instance
     */
    function create()
    {
        $request = [
            'method' => 'Peoples.create',
            'params' => [
                'people' => [
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
                    'phoningUnsubscribed'           => 'Y',
                    'massmailingUnsubscribedMail'   => 'Y',
                    'massmailingUnsubscribedCustom' => 'Y',
                    //'birthdate' => 1510527600,
                    'tags'            => ['api', 'michael'],
                    'position'        => $this->faker->jobTitle,
                    'web'             => $this->faker->domainName,
                    'facebook'        => 'https://fr-fr.facebook.com/'.$this->faker->userName,       // not disponible - tester : $this->faker->random->uuid()
                    'viadeo'          => 'https://fr.viadeo.com/fr/company/'.$this->faker->userName, // not disponible
                    'linkedin'        => 'https://fr.linkedin.com/company/'.$this->faker->userName,  // not disponible
                    'twitter'         => 'https://twitter.com/'.$this->faker->userName,              // not disponible
                    'stickyNote'      => $this->faker->text,
                    'mailchimp'       => 'Y',
                    'mailjet'         => 'Y',
                    'simplemail'      => 'Y',
                ]
            ]
        ];

        $response = sellsyconnect_curl::load()->requestApi($request);
        echo '<pre>'.var_export($response, true).'</pre>';
        echo '<hr>';

        return $response;
    }

}