<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;

    class Page extends SiteTree
    {
        private static $db = [
            'isNoHeader' => 'Boolean',
        ];

        private static $has_one = [
            'PageBgImage' => Image::class
        ];

        private static $owns = [
            'PageBgImage'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields(); // TODO: Change the autogenerated stub

            $fields->addFieldToTab('Root.Main', UploadField::create('PageBgImage', 'Page background image')
                ->setFolderName('PageBackgroundImages'),'Content');
            $fields->addFieldToTab('Root.Main', CheckboxField::create('isNoHeader', 'Remove page header'), 'Content');

            return $fields;
        }
    }
}
