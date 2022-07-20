<?php
class Config{
    static function data() {
        return [
            'staff' => [
                'id'           => [1],
            ],
            'client' => [
                'rateCategory' => 1,
                //'id'         => 179,              // idClient  Michael
                //'idContact'  => 259,              // idContact Michael
                'id'           => 1343688,          // idClient  Antho
                'idContact'    => 584679,           // idContact Antho
            ],
            'prospect' => [
                'rateCategory' => 1,
                'id'           => 1128,             // idProspect
            ],
            'contact' => [
                'id'           => [50, 51, 52],     // idContact
            ],
            'opportunity' => [
                'sourceId'     => 5,
                'funnelId'     => 1,
                'stepId'       => 11,
            ],
            'document' => [
                //'taxid'      => 1137955,  // michael
                'taxid'        => 229842,  // Antho
            ]
        ];
    }
}
