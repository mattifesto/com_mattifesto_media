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
        return (object)[
            'className' => 'CBViewPage',
            'classNameForKind' => 'MattifestoMediaBlogPostPageKind',
            'classNameForSettings' => 'MattifestoMediaPageSettings',
            'frameClassName' => 'MattifestoMediaPageFrame',
            'selectedMainMenuItemName' => 'blog',
            'sections' => CBDefaults_BlogPost::viewSpecs(),
        ];
    }
    /* CBModelTemplate_spec() */



    /**
     * @return string
     */
    static function CBModelTemplate_title(): string {
        return 'Blog Post';
    }

}
