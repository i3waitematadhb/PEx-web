<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\ORM\DataExtension;

    class SiteConfigExtension extends DataExtension
    {
        private static $has_one = [
            'SiteLogo' => Image::class
        ];

        private static $owns = [
            'SiteLogo'
        ];

        public function updateCMSFields(FieldList $fields)
        {
            $fields->addFieldToTab('Root.Main', UploadField::create('SiteLogo')
                ->setFolderName('SiteLogo'));
        }
    }
}
