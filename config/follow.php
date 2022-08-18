<?php

return [
	/*
     * Use uuid as primary key.
     */
    'uuids' => false,
    
    'push_js' => 'js',
    /*
     * User tables foreign key name.
     */
    'user_foreign_key' => 'user_id',

    /*
     * Table name for followers table.
     */
    'followables_table' => 'followables',

    /**
     * Model class name for followers table.
     */
    'followables_model' => \App\Models\Followable::class,
];
