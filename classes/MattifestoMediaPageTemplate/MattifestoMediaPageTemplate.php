<?php

final class MattifestoMediaPageTemplate {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBModelTemplateCatalog::install(__CLASS__);
        CBModelTemplateCatalog::installLivePageTemplate(__CLASS__);
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBModelTemplateCatalog'];
    }

    /**
     * @return model
     */
    static function CBModelTemplate_spec(): stdClass {
        $pageTemplate = CBViewPage::standardPageTemplate();

        CBModel::merge(
            $pageTemplate,
            (object)[
                'sections' => [
                    (object)[
                        'className' => 'CBPageTitleAndDescriptionView',
                    ],
                    (object)[
                        'className' => 'CBArtworkView',
                    ],
                    (object)[
                        'className' => 'CBMessageView',
                    ],
                ],
            ]
        );

        return $pageTemplate;
    }

    /**
     * @return string
     */
    static function CBModelTemplate_title(): string {
        return 'Page';
    }
}
