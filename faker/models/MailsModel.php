<?php
class MailsModel{

    private $faker;

    public function __construct($faker)
    {
        $this->faker = $faker;
    }

    /**
     * Create
     * @param $faker faker instance
     */
    public function create($emailsList=['apiSellsy@eewee.fr'])
    {
        foreach ($emailsList as $email) {
            $request =  array(
                'method' => 'Mails.sendOne',
                'params' => array(
                    'email' => array(
                        'linkedtype'    => 'people',
                        'linkedid'      => 8363161,
                        //'relatedtype' => {{relatedtype}},
                        //'relatedid'   => {{relatedid}},
                        'emails'        => [$email],
                        //'emailsCC'    => {{emailsCC}},
                        //'emailsBCC'   => {{emailsBCC}},

                        //'addsendertoemail'      => {{addsendertoemail}},
                        //'includeAttachments'    => {{includeAttachments}},
                        //'scheduled_timestamp'   => {{scheduled_timestamp}},

                        'content'       => 'Bonjour,<br><br>'.$this->faker->paragraph($nbSentences = 5, $variableNbSentences = true).'<br>',
                        'subject'       => '[API] '.$this->faker->words(3, true),
                        //'includeDoc'    => {{includeDoc}},
                    )
                )
            );

            $response = sellsyconnect_curl::load()->requestApi($request);
            echo '<pre>'.var_export($response, true).'</pre>';
            echo '<hr>';
        }

        return $response;
    }

}