<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\ORM\DataExtension;

    class SiteConfigExtension extends DataExtension
    {
        private static $has_one = [
            'PageBgImage' => Image::class
        ];

        private static $owns = [
            'PageBgImage'
        ];

        public function updateCMSFields(FieldList $fields)
        {
            $fields->addFieldToTab('Root.Main', UploadField::create('PageBgImage', 'Page background image')
                ->setFolderName('PageBackground_Images'));
        }
    }
}
