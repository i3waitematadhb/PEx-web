<?php

namespace {

    use SilverStripe\Forms\FieldList;
    use SwiftDevLabs\CodeEditorField\Forms\CodeEditorField;

    class CodeEditor extends Section
    {
        private static $singular_name = 'Code Editor';

        private static $db = [
            'CodeEditorText' => 'HTMLText',
        ];

        public function getSectionCMSFields(FieldList $fields)
        {
            $fields->addFieldToTab('Root.Main', CodeEditorField::create('CodeEditorText', 'Code editor'));
        }
    }
}
