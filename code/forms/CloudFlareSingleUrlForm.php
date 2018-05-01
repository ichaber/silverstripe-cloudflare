<?php

namespace SteadLane\CloudFlare\Forms;

use SilverStripe\Core\Injector\Injectable;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;


class CloudFlareSingleUrlForm extends Form
{
    use Injectable;

    public function __construct($controller, $name)
    {
        $fields = FieldList::create(
            TextField::create("url_to_purge", "")->setAttribute("placeholder",
                '/path/to/file.js [, /path/to/file.css, /path/to/url]')
        );

        $actions = FieldList::create(
            FormAction::create('handlePurgeUrl',
                _t(
                    'CloudFlare.SingleUrlPurgeButton',
                    'Purge'
                )
            )
        );

        parent::__construct($controller, $name, $fields, $actions);
    }
}