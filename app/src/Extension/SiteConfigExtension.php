<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
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

            /*
             * Section Width
             */
            $configWidth = GridFieldConfig_RecordEditor::create('999');
            $editorWidth = GridField::create('SectionWidth', 'Width', Width::get(), $configWidth);
            $fields->addFieldToTab('Root.SectionSettings', $editorWidth);

            /*
             * Animation
             */
            $configAnimation = GridFieldConfig_RecordEditor::create('999');
            $editorAnimation = GridField::create('Animations', 'Animation', Animations::get(), $configAnimation);
            $fields->addFieldToTab('Root.SectionSettings', $editorAnimation);
        }
    }
}
