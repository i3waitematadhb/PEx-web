<?php

namespace {

    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\File;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\TextareaField;

    class VideoBanner extends Section
    {
        private static $singular_name = 'Video Banner';

        private static $db = [
            'Content' => 'HTMLText',
            'ExternalVideo' => 'Text'
        ];

        private static $has_one = [
            'Image' => File::class,
            'Video' => File::class,
            'VideoThumbnail' => Image::class
        ];

        private static $owns = [
            'Image',
            'VideoThumbnail',
            'Video',
        ];

        public function getSectionCMSFields(FieldList $fields)
        {
            $fields->addFieldToTab('Root.Main', UploadField::create('Video')
                ->setFolderName('VideoBanner/Videos'));
            $fields->addFieldToTab('Root.Main', UploadField::create('VideoThumbnail')
                ->setFolderName('VideoBanner/ImageThumbnails'));
            $fields->addFieldToTab('Root.Main', TextareaField::create('ExternalVideo')
                ->setDescription('Allowed video-sharing platform: Youtube & Vimeo'));
            $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'SVG Layout')
                ->setFolderName('Banner/Images'));
            $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content'));
        }
    }
}
