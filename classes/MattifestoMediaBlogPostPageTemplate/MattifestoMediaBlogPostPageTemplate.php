<?php

final class MattifestoMediaBlogPostPageTemplate {

    /* -- CBInstall interfaces -- -- -- -- -- */



    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBModelTemplateCatalog::install(__CLASS__);
    }



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBModelTemplateCatalog'
        ];
    }



    /* -- CBModelTemplate interfaces -- -- -- -- -- */



    /**
     * @return object
     */
    static function CBModelTemplate_spec(): stdClass {
        $pageTemplate = CBViewPage::standardPageTemplate();

        CBModel::merge(
            $pageTemplate,
            (object)[
                'classNameForKind' => 'MattifestoMediaBlogPostPageKind',
                'selectedMainMenuItemName' => 'blog',
                'sections' => CBDefaults_BlogPost::viewSpecs(),
            ]
        );

        return $pageTemplate;
    }
    /* CBModelTemplate_spec() */



    /**
     * @return string
     */
    static function CBModelTemplate_title(): string {
        return 'Blog Post';
    }

}
