<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\File;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

    class Banner extends Section
    {
        private static $singular_name = 'Banner';

        private static $db = [
            'Content' => 'HTMLText',
        ];

        private static $has_one = [
            'Image' => File::class
        ];

        private static $owns = [
            'Image'
        ];

        public function getSectionCMSFields(FieldList $fields)
        {
            $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Banner image')
                ->setFolderName('Banner/Images'));
            $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content'));
        }
    }
}
